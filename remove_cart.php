<?php

echo "<pre>";
print_r($_REQUEST);
print_r($_COOKIE);
echo "</pre>";

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "remove") {

    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : 0;
    $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : 0;

    if($user_id && $product_id) {
        // Remove the item from the cart cookie
        setcookie("cart[$user_id][$product_id]", "", time() - 3600, "/");
        header("location:cart.php?msg=Product removed from cart successfully.");
        exit;
    } else {
        header("location:cart.php?msg=Invalid user or product ID.");
        exit;
    }

}

?>