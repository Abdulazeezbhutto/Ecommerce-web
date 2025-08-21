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
        <form method="post" action="checkout_process.php" id="payment-form">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="col-12">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-12">
              <label class="form-label">Address</label>
              <input type="text" class="form-control" name="address" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">City</label>
              <input type="text" class="form-control" name="city" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">State/Province</label>
              <input type="text" class="form-control" name="state" required>
            </div>
            <div class="col-md-2">
              <label class="form-label">Zip</label>
              <input type="text" class="form-control" name="zip" required>
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


            <!-- Payment Buttons -->
            <h5 class="card-title mb-3">Payment Method</h5>
            <br><hr/><br>

            <input type="hidden" name="total_amount" value="<?php echo $subtotal + $shipping; ?>">

            <!-- COD Button -->
            <button type="submit" name="cod_submit" class="btn btn-primary w-100 mt-3">Place Order (COD)</button>

            <!-- Stripe Button -->
            <button type="button" class="btn btn-success w-100 mt-2" id="stripeBtn">Place Order (Stripe)</button>

            </form>


            </form>
          </div>
        </div>
</section>


<!-- Stripe Modal -->
<div class="modal fade" id="stripeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Complete Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Enter your card details to pay <strong>$<?php echo number_format($subtotal + $shipping, 2); ?></strong></p>
        
        <form id="stripe-form" action="checkout_process.php" method="POST">
          <div id="card-element" class="form-control"></div>
          <div id="card-errors" class="text-danger mt-2"></div>
          <input type="hidden" name="payment_method" value="stripe">
          <input type="hidden" name="total_amount" value="<?php echo $subtotal + $shipping; ?>">
          <button type="submit" class="btn btn-success w-100 mt-3">Pay Now</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
  let stripe = Stripe("pk_test_51RyUHVCaHnfHJUzWrj3TBEfLWTVdQJUOBJNJZzbViBGcnj30Q2ioYzirwBOwE2BBOVuhAJI4LjC6IUmW47tOrlrt00rRRpHLhi");
  let elements = stripe.elements();
  let card = elements.create("card");
  card.mount("#card-element");

  // Stripe Modal Open
  document.getElementById("stripeBtn").addEventListener("click", function() {
    let modal = new bootstrap.Modal(document.getElementById("stripeModal"));
    modal.show();
  });

  // Handle Stripe Form Submission
  let form = document.getElementById("stripe-form");
  form.addEventListener("submit", async function(event) {
    event.preventDefault();

    const {paymentMethod, error} = await stripe.createPaymentMethod({
      type: "card",
      card: card,
    });

    if (error) {
      document.getElementById("card-errors").textContent = error.message;
    } else {
      // Insert Stripe Payment ID into hidden field
      let hiddenInput = document.createElement("input");
      hiddenInput.type = "hidden";
      hiddenInput.name = "stripe_payment_id";
      hiddenInput.value = paymentMethod.id;
      form.appendChild(hiddenInput);

      // Submit form to checkout_process.php
      form.submit();
    }
  });
</script>

<?php WebConfig::footer(); ?>