<?php
session_start();

// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

// Check if user is logged in
if(!isset($_SESSION['user']['user_id'])) {
    echo "<p>Please login first to add items to the cart.</p>";
    exit;
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "cart_process") {
    $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : "";
    $quantity = isset($_REQUEST['quantity']) ? (int)$_REQUEST['quantity'] : 1;
    $user_id = $_SESSION['user']['user_id'];
    $price = isset($_REQUEST['price']) ? (float)$_REQUEST['price'] : 0;
    $image = isset($_REQUEST['image_path']) ? $_REQUEST['image_path'] : "";
    $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : "";

    if(empty($product_id)) {
        echo "<p>Product ID is required.</p>";
        exit;
    }

    // Set the cookie for the user's cart
    // Using JSON to store quantity and price if needed later
    $cart_item = json_encode(['quantity' => $quantity, 'price' => $price , 'image' => $image, 'product_name' => $product_name]);
    setcookie("cart[$user_id][$product_id]", $cart_item, time() + (86400 * 30), "/"); // 30 days

    echo "<p>Product added to cart successfully.</p>";

    // Optional: display current cart
    // if(isset($_COOKIE['cart'][$user_id])) {
    //     echo "<pre>Current Cart: ";
    //     print_r($_COOKIE['cart'][$user_id]);
    //     echo "</pre>";
    // }

} else {
    echo "<p>Invalid action.</p>";
}


?>
