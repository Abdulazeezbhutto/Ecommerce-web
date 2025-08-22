<?php
session_start();
require("require/database_connection.php");
require_once __DIR__ . "/stripe-php-master/init.php";

class Checkout {
    private $connection;
    private $user_id;
    private $cart;
    private $total_amount = 0;
    private $total_items = 0;
    private $shipping_address = "";

    public function __construct($connection) {
        $this->connection = $connection->connection;
        $this->user_id = $_SESSION['user']['user_id'] ?? 0;

        if (!$this->user_id) {
            $this->redirect("cart.php?msg=Please login first");
        }

        if (!isset($_COOKIE['cart'][$this->user_id]) || !is_array($_COOKIE['cart'][$this->user_id]) || empty($_COOKIE['cart'][$this->user_id])) {
            $this->redirect("cart.php?msg=Your cart is empty");
        }

        $this->cart = $_COOKIE['cart'][$this->user_id];
        $this->calculateTotals();
        $this->setShippingAddress();
    }

    private function calculateTotals() {
        foreach ($this->cart as $product_id => $item_json) {
            $item = json_decode($item_json, true);
            if ($item && isset($item['price'], $item['quantity'])) {
                $this->total_amount += $item['price'] * $item['quantity'];
                $this->total_items += $item['quantity'];
            }
        }
    }

    private function setShippingAddress() {
        $address = mysqli_real_escape_string($this->connection, $_REQUEST['address'] ?? '');
        $city    = mysqli_real_escape_string($this->connection, $_REQUEST['city'] ?? '');
        $state   = mysqli_real_escape_string($this->connection, $_REQUEST['state'] ?? '');
        $zip     = mysqli_real_escape_string($this->connection, $_REQUEST['zip'] ?? '');
        $this->shipping_address = "$address, $city, $state, $zip";
    }

    private function redirect($url) {
        header("Location: $url");
        exit;
    }

    private function clearCart() {
        foreach ($this->cart as $product_id => $item) {
            setcookie("cart[$this->user_id][$product_id]", "", time() - 3600, "/");
        }
        setcookie("cart[$this->user_id]", "", time() - 3600, "/");
        unset($_COOKIE['cart'][$this->user_id]);
    }

    private function saveOrder($payment_method) {
        $query = "INSERT INTO orders (user_id, total_ammount, shipping_address, order_status, payment_method, placed_at, updated_at) 
                  VALUES ('$this->user_id', '$this->total_amount', '$this->shipping_address', 'Pending', '$payment_method', NOW(), NULL)";
        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $order_id = mysqli_insert_id($this->connection);

            foreach ($this->cart as $product_id => $item_json) {
                $item = json_decode($item_json, true);
                if ($item && isset($item['quantity'], $item['price'])) {
                    $quantity = (int)$item['quantity'];
                    $price    = (float)$item['price'];
                    $image    = mysqli_real_escape_string($this->connection, $item['image']);

                    $query = "INSERT INTO order_items (order_id, image_path) 
                              VALUES ('$order_id', '$image')";
                    mysqli_query($this->connection, $query);

                    $update_stock = "UPDATE products 
                                     SET stock_quamtitiy = stock_quamtitiy - $quantity 
                                     WHERE product_id = $product_id AND stock_quamtitiy >= $quantity";
                    mysqli_query($this->connection, $update_stock);
                }
            }

            $this->clearCart();
            return $order_id;
        }
        return false;
    }

    public function processCOD() {
        $order_id = $this->saveOrder("COD");
        if ($order_id) {
            $this->redirect("cart.php?msg=Thank you for your COD order!");
        } else {
            $error = mysqli_error($this->connection);
            $this->redirect("cart.php?msg=Error placing order: $error");
        }
    }

    public function processStripe($payment_id) {
        $stripe_key = "sk_test_51RyUHVCaHnfHJUzWct6NlWfyeY3Pt37Qy5cCkUOBpbohSs5fUI6YNctzDx3KZ5tnpcMc6wFZl7RZLhW5ERkt1KLL00pP832CEg";
        \Stripe\Stripe::setApiKey($stripe_key);

        try {
            $amountInCents = (int) round($this->total_amount * 100);

            $paymentIntent = \Stripe\PaymentIntent::create([
                "amount" => $amountInCents,
                "currency" => "usd",
                "payment_method" => $payment_id,
                "confirm" => true,
                "payment_method_types" => ["card"],
                "description" => "Order Payment by User ID: {$this->user_id}",
            ]);

            if ($paymentIntent->status === "succeeded") {
                $order_id = $this->saveOrder("Stripe");

                if ($order_id) {
                    $this->redirect("cart.php?msg=" . urlencode("Payment successful. Order placed!"));
                } else {
                    $this->redirect("cart.php?msg=" . urlencode("Order save failed after payment."));
                }
            } else {
                $this->redirect("cart.php?msg=" . urlencode("Payment status: " . $paymentIntent->status));
            }
        } catch (\Stripe\Exception\CardException $e) {
            $this->redirect("cart.php?msg=" . urlencode("Stripe Error: " . $e->getMessage()));
        } catch (\Exception $e) {
            $this->redirect("cart.php?msg=" . urlencode("Error: " . $e->getMessage()));
        }
    }
}

// --- Run Checkout ---
$checkout = new Checkout($connection);

if (isset($_POST['cod_submit'])) {
    $checkout->processCOD();
} elseif (isset($_POST['stripe_payment_id'])) {
    $checkout->processStripe($_POST['stripe_payment_id']);
}
?>
