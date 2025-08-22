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

      <!-- Checkout Form -->
      <form method="post" action="checkout_process.php" id="payment-form" class="row g-4">

        <!-- Billing Details -->
        <div class="col-lg-7">
          <h5 class="mb-3">Billing Details</h5>
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

        <!-- Order Summary -->
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

              <!-- Hidden Total -->
              <input type="hidden" name="total_amount" value="<?php echo $subtotal + $shipping; ?>">

              <!-- Payment Options -->
              <h5 class="card-title mb-3">Payment Method</h5>
              <hr/>

              <!-- COD -->
              <button type="submit" name="cod_submit" class="btn btn-primary w-100 mt-3">
                Place Order (COD)
              </button>

              <!-- Stripe -->
              <div id="card-element" class="form-control p-3 my-3"></div>
              <div id="card-errors" class="text-danger small mb-2"></div>
              <button type="submit" id="stripeBtn" class="btn btn-success w-100">
                Pay with Stripe
              </button>

              <!-- Stripe hidden field -->
              <input type="hidden" name="stripe_payment_id" id="stripe_payment_id">
              <input type="hidden" name="payment_method" value="stripe">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<script>
  var stripekey = "pk_test_51RyUHVCaHnfHJUzWrj3TBEfLWTVdQJUOBJNJZzbViBGcnj30Q2ioYzirwBOwE2BBOVuhAJI4LjC6IUmW47tOrlrt00rRRpHLhi";
  let stripe = Stripe(stripekey); 
  let elements = stripe.elements();
  let card = elements.create("card");
  card.mount("#card-element");

  let form = document.getElementById("payment-form");
  form.addEventListener("submit", async function(event) {
    if (event.submitter && event.submitter.id === "stripeBtn") {
      event.preventDefault();

      const {paymentMethod, error} = await stripe.createPaymentMethod({
        type: "card",
        card: card,
        billing_details: {
          name: document.querySelector("input[name=first_name]").value + " " + 
                document.querySelector("input[name=last_name]").value,
          email: document.querySelector("input[name=email]").value,
          address: {
            line1: document.querySelector("input[name=address]").value,
            city: document.querySelector("input[name=city]").value,
            state: document.querySelector("input[name=state]").value,
            postal_code: document.querySelector("input[name=zip]").value,
          }
        }
      });

      if (error) {
        document.getElementById("card-errors").textContent = error.message;
      } else {
        document.getElementById("stripe_payment_id").value = paymentMethod.id;
        form.submit();
      }
    }
  });
</script>

<?php WebConfig::footer(); ?>
