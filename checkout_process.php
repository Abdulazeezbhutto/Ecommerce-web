<?php
session_start();
require("require/database_connection.php");


if(isset($_POST['cod_submit'])){
    // Handle Cash on Delivery payment


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

// Calculate total amount
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
$city    = mysqli_real_escape_string($connection->connection, $_REQUEST['city'] ?? '');
$state   = mysqli_real_escape_string($connection->connection, $_REQUEST['state'] ?? '');
$zip     = mysqli_real_escape_string($connection->connection, $_REQUEST['zip'] ?? '');
$payment_method = mysqli_real_escape_string($connection->connection, $_REQUEST['payment_method'] ?? '');

$shipping_address = "$address, $city, $state, $zip";

// Insert order into database
$query = "INSERT INTO orders (user_id, total_ammount, shipping_address, order_status, payment_method, placed_at, updated_at) 
          VALUES ('$user_id', '$total_amount', '$shipping_address', 'Pending', '$payment_method', NOW(), null)";

$result = mysqli_query($connection->connection, $query);

if ($result) {
    $order_id = mysqli_insert_id($connection->connection); // new order id

    // Insert order items
    foreach ($_COOKIE['cart'][$user_id] as $product_id => $item_json) {
        $item = json_decode($item_json, true);
        if ($item && isset($item['quantity'], $item['price'])) {
            $quantity = (int)$item['quantity'];
            $price    = (float)$item['price'];
            $image    = mysqli_real_escape_string($connection->connection, $item['image']);

            // Insert into order_items (order_id + image)
            $query = "INSERT INTO order_items (order_id, image_path) 
                      VALUES ('$order_id', '$image')";
            mysqli_query($connection->connection, $query);

            // Decrease stock
            $update_stock = "UPDATE products 
                             SET stock_quamtitiy = stock_quamtitiy - $quantity 
                             WHERE product_id = $product_id AND stock_quamtitiy >= $quantity";
            mysqli_query($connection->connection, $update_stock);
        }
    }

    // Clear cart cookies
    foreach ($_COOKIE['cart'][$user_id] as $product_id => $item) {
        setcookie("cart[$user_id][$product_id]", "", time() - 3600, "/");
    }
    setcookie("cart[$user_id]", "", time() - 3600, "/");
    unset($_COOKIE['cart'][$user_id]);

    header("Location: cart.php?msg=Thank you for your order!");
    exit;
} else {
    $error = mysqli_error($connection->connection);
    header("Location: cart.php?msg=Error placing order: $error");
    exit;
}

}
elseif(isset($_POST['stripe_payment_id'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    

    // setting key
}

?>
