<?php
include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();

$user_id = isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : 0;
$cart_items = isset($_COOKIE['cart'][$user_id]) ? $_COOKIE['cart'][$user_id] : [];
$subtotal = 0;
$shipping = !empty($cart_items) ? 15 : 0;
?>

<section class="checkout-section py-5">
  <div class="container">
    <h2 class="mb-4">Checkout</h2>
    <div class="row g-4">

      <!-- Billing Details Form -->
      <div class="col-lg-7">
        <h5 class="mb-3">Billing Details</h5>
        <form method="post" action="checkout_process.php">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" name="first_name" placeholder="John" required>
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Doe" required>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
            </div>
            <div class="col-md-6">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="col-md-4">
              <label for="state" class="form-label">State/Province</label>
              <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="col-md-2">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" name="zip" required>
            </div>
          </div>
      </div>

      <!-- Order Summary & Payment -->
      <div class="col-lg-5">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-3">Order Summary</h5>
            <ul class="list-group mb-3">
              <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $product_id => $item_json):
                  $item = json_decode($item_json, true);
                  $item_total = $item['quantity'] * $item['price'];
                  $subtotal += $item_total;
                  ?>
                  <li class="list-group-item d-flex justify-content-between">
                    <span><?php echo htmlspecialchars($item['product_name']); ?> (x<?php echo $item['quantity']; ?>)</span>
                    <strong>$<?php echo number_format($item_total, 2); ?></strong>
                  </li>
                <?php endforeach; ?>
              <?php else: ?>
                <li class="list-group-item">Your cart is empty.</li>
              <?php endif; ?>

              <li class="list-group-item d-flex justify-content-between">
                <span>Subtotal</span>
                <strong>$<?php echo number_format($subtotal, 2); ?></strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Shipping</span>
                <strong>$<?php echo number_format($shipping, 2); ?></strong>
              </li>
              <li class="list-group-item d-flex justify-content-between fw-bold">
                <span>Total</span>
                <strong>$<?php echo number_format($subtotal + $shipping, 2); ?></strong>
              </li>
            </ul>

            <h5 class="card-title mb-3">Payment Method</h5>
            <div class="mb-2">
              <input class="form-check-input" type="radio" name="payment_method" id="creditCard" value="Credit Card" checked>
              <label class="form-check-label" for="creditCard">Credit Card</label>
            </div>
            <div class="mb-2">
              <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="PayPal">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
            <div class="mb-2">
              <input class="form-check-input" type="radio" name="payment_method" id="bankTransfer" value="Bank Transfer">
              <label class="form-check-label" for="bankTransfer">Bank Transfer</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Place Order</button>
          </div>
        </div>
      </div>

      </form>
    </div>
  </div>
</section>

<?php WebConfig::footer(); ?>
