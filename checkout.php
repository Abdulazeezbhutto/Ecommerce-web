<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





?>

<section class="checkout-section py-5">
  <div class="container">
    <h2 class="mb-4">Checkout</h2>
    <div class="row g-4">
      
      <!-- Billing Details Form -->
      <div class="col-lg-7">
        <h5 class="mb-3">Billing Details</h5>
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" placeholder="John" required>
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName" placeholder="Doe" required>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            </div>
            <div class="col-md-6">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" required>
            </div>
            <div class="col-md-4">
              <label for="state" class="form-label">State/Province</label>
              <input type="text" class="form-control" id="state" required>
            </div>
            <div class="col-md-2">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" required>
            </div>
          </div>
        </form>
      </div>
      
      <!-- Order Summary & Payment -->
      <div class="col-lg-5">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-3">Order Summary</h5>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between">
                <span>Classic Baggy Shirt (x2)</span>
                <strong>$110.00</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Cotton Off-white Shirt (x1)</span>
                <strong>$65.00</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Subtotal</span>
                <strong>$175.00</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Shipping</span>
                <strong>$15.00</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between fw-bold">
                <span>Total</span>
                <strong>$190.00</strong>
              </li>
            </ul>
            
            <h5 class="card-title mb-3">Payment Method</h5>
            <form>
              <div class="mb-2">
                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" checked>
                <label class="form-check-label" for="creditCard">Credit Card</label>
              </div>
              <div class="mb-2">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
              <div class="mb-2">
                <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer">
                <label class="form-check-label" for="bankTransfer">Bank Transfer</label>
              </div>
            </form>
            
            <button class="btn btn-primary w-100 mt-3">Place Order</button>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>








<?php WebConfig::footer();?>


