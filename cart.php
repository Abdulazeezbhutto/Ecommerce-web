<?php
include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();

// Get current user ID
$user_id = isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0;

// Get cart items from cookie
$cart_items = isset($_COOKIE['cart'][$user_id]) ? $_COOKIE['cart'][$user_id] : [];
$total = 0;
?>

<span><?php echo isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : ''; ?></span>
<section class="cart-section py-5">
  <div class="container">
    <h2 class="mb-4">Shopping Cart</h2>
    <div class="row">
      <!-- Cart Items -->
      <div class="col-lg-8">
        <div class="list-group">
          <?php if(!empty($cart_items)): ?>
            <?php foreach($cart_items as $product_id => $item_json): ?>
              <?php
                $item = json_decode($item_json, true);
                $subtotal = $item['quantity'] * $item['price'];
                $total += $subtotal;
              ?>
              <div class="list-group-item d-flex align-items-center py-3">
                <img src="uploads/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>" class="img-thumbnail me-3" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="flex-grow-1">
                  <h5 class="mb-1"><?php echo htmlspecialchars($item['product_name']); ?></h5>
                  <p class="mb-1 text-muted">$<?php echo number_format($item['price'], 2); ?> each</p>
                  <div class="d-flex align-items-center gap-3">
                    <label class="form-label mb-0">Qty:</label>
                    <input type="number" class="form-control form-control-sm quantity-input" data-product-id="<?php echo $product_id; ?>" value="<?php echo $item['quantity']; ?>" min="1" style="width: 70px;">
                    <a href="remove_cart.php?user_id=<?php echo $user_id; ?>&product_id=<?php echo $product_id; ?>&action=remove" 
                      class="btn btn-outline-danger btn-sm ms-auto">
                      Remove
                    </a>
                  </div>
                </div>
                <div class="fw-bold ms-4">$<?php echo number_format($subtotal, 2); ?></div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Your cart is empty.</p>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Cart Summary -->
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Order Summary</h5>
            <ul class="list-unstyled mb-3">
              <li class="d-flex justify-content-between">
                <span>Subtotal:</span>
                <span>$<?php echo number_format($total, 2); ?></span>
              </li>
              <li class="d-flex justify-content-between">
                <span>Shipping:</span>
                <span>$15.00</span>
              </li>
              <li class="d-flex justify-content-between fw-bold fs-5">
                <span>Total:</span>
                <span>$<?php echo number_format($total + 10, 2); ?></span>
              </li>
            </ul>
            <a href="checkout.php?user_id=<?php echo $user_id; ?>" class="btn btn-primary w-100 mb-2">Proceed to Checkout</a>
            <a href="shop.php" class="btn btn-outline-secondary w-100">Continue Shopping</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<?php WebConfig::footer(); ?>
