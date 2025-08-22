<?php
session_start();
require("require/database_connection.php");
include("stripe-php-master/init.php");
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// die();


// Common function to save order
function saveOrder($connection, $user_id, $total_amount, $shipping_address, $payment_method, $cart) {
    $query = "INSERT INTO orders (user_id, total_ammount, shipping_address, order_status, payment_method, placed_at, updated_at) 
              VALUES ('$user_id', '$total_amount', '$shipping_address', 'Pending', '$payment_method', NOW(), NULL)";
    $result = mysqli_query($connection->connection, $query);

    if ($result) {
        $order_id = mysqli_insert_id($connection->connection);

        // Insert order items
        foreach ($cart as $product_id => $item_json) {
            $item = json_decode($item_json, true);
            if ($item && isset($item['quantity'], $item['price'])) {
                $quantity = (int)$item['quantity'];
                $price = (float)$item['price'];
                $image = mysqli_real_escape_string($connection->connection, $item['image']);

                $query = "INSERT INTO order_items (order_id,image_path) 
                          VALUES ('$order_id','$image')";
                mysqli_query($connection->connection, $query);

                // Decrease stock
                $update_stock = "UPDATE products 
                                 SET stock_quamtitiy = stock_quamtitiy - $quantity 
                                 WHERE product_id = $product_id AND stock_quamtitiy >= $quantity";
                mysqli_query($connection->connection, $update_stock);
            }
        }

        // Clear cart
        foreach ($cart as $product_id => $item) {
            setcookie("cart[$user_id][$product_id]", "", time() - 3600, "/");
        }
        setcookie("cart[$user_id]", "", time() - 3600, "/");
        unset($_COOKIE['cart'][$user_id]);

        return $order_id;
    } else {
        return false;
    }
}

// Check if user is logged in
$user_id = $_SESSION['user']['user_id'] ?? 0;
if (!$user_id) {
    header("Location: cart.php?msg=Please login first");
    exit;
}

// Check if cart exists
if (!isset($_COOKIE['cart'][$user_id]) || !is_array($_COOKIE['cart'][$user_id]) || empty($_COOKIE['cart'][$user_id])) {
    header("Location: cart.php?msg=Your cart is empty");
    exit;
}

// Calculate total
$total_amount = 0;
$total_items = 0;
foreach ($_COOKIE['cart'][$user_id] as $product_id => $item_json) {
    $item = json_decode($item_json, true);
    if ($item && isset($item['price'], $item['quantity'])) {
        $total_amount += $item['price'] * $item['quantity'];
        $total_items += $item['quantity'];
    }
}

// Sanitize shipping details
$address = mysqli_real_escape_string($connection->connection, $_REQUEST['address'] ?? '');
$city = mysqli_real_escape_string($connection->connection, $_REQUEST['city'] ?? '');
$state = mysqli_real_escape_string($connection->connection, $_REQUEST['state'] ?? '');
$zip = mysqli_real_escape_string($connection->connection, $_REQUEST['zip'] ?? '');
$payment_method = mysqli_real_escape_string($connection->connection, $_REQUEST['payment_method'] ?? '');

$shipping_address = "$address, $city, $state, $zip";

// COD Payment
if (isset($_POST['cod_submit'])) {
    $order_id = saveOrder($connection, $user_id, $total_amount, $shipping_address, "COD", $_COOKIE['cart'][$user_id]);

    if ($order_id) {
        header("Location: cart.php?msg=Thank you for your COD order!");
        exit;
    } else {
        $error = mysqli_error($connection->connection);
        header("Location: cart.php?msg=Error placing order: $error");
        exit;
    }
}

// Stripe Payment
elseif (isset($_POST['stripe_payment_id'])) {
    \Stripe\Stripe::setApiKey(""); // Insert here stripe's secret key

    try {
        
        $paymentIntent = \Stripe\PaymentIntent::create([
            "amount" => $total_amount * 100, 
            "currency" => "usd",
            "payment_method" => $_POST['stripe_payment_id'],
            "payment_method_types" => ["card"], 
            "confirmation_method" => "manual",
            "confirm" => true,
            "description" => "Order Payment by User ID: $user_id",
        ]);

        if ($paymentIntent->status === "succeeded") {
            $order_id = saveOrder($connection, $user_id, $total_amount, $shipping_address, "Stripe", $_COOKIE['cart'][$user_id]);
            if ($order_id) {
                header("Location: cart.php?msg=Payment successful. Order placed!");
                exit;
            }
        } else {
            header("Location: cart.php?msg=Payment status: " . $paymentIntent->status);
            exit;
        }

    } catch (\Stripe\Exception\CardException $e) {
        header("Location: cart.php?msg=Stripe Error: " . $e->getMessage());
        exit;
    } catch (\Exception $e) {
        header("Location: cart.php?msg=Error: " . $e->getMessage());
        exit;
    }
}


?>
