<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





?>


<section class="cart-section py-5">
  <div class="container">
    <h2 class="mb-4">Shopping Cart</h2>
    
    <div class="row">
      <!-- Cart Items -->
      <div class="col-lg-8">
        <div class="list-group">
          
          <!-- Cart Item 1 -->
          <div class="list-group-item d-flex align-items-center py-3">
            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&fit=crop&w=100&q=80" alt="Product 1" class="img-thumbnail me-3" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="flex-grow-1">
              <h5 class="mb-1">Classic Baggy Shirt</h5>
              <p class="mb-1 text-muted">$55.00 each</p>
              <div class="d-flex align-items-center gap-3">
                <label for="quantity1" class="form-label mb-0">Qty:</label>
                <input type="number" id="quantity1" class="form-control form-control-sm" value="2" min="1" style="width: 70px;">
                <button type="button" class="btn btn-outline-danger btn-sm ms-auto">Remove</button>
              </div>
            </div>
            <div class="fw-bold ms-4">$110.00</div>
          </div>
          
          <!-- Cart Item 2 -->
          <div class="list-group-item d-flex align-items-center py-3">
            <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=100&q=80" alt="Product 2" class="img-thumbnail me-3" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="flex-grow-1">
              <h5 class="mb-1">Cotton Off-white Shirt</h5>
              <p class="mb-1 text-muted">$65.00 each</p>
              <div class="d-flex align-items-center gap-3">
                <label for="quantity2" class="form-label mb-0">Qty:</label>
                <input type="number" id="quantity2" class="form-control form-control-sm" value="1" min="1" style="width: 70px;">
                <button type="button" class="btn btn-outline-danger btn-sm ms-auto">Remove</button>
              </div>
            </div>
            <div class="fw-bold ms-4">$65.00</div>
          </div>
          
          <!-- Add more cart items here -->
          
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
                <span>$175.00</span>
              </li>
              <li class="d-flex justify-content-between">
                <span>Shipping:</span>
                <span>$15.00</span>
              </li>
              <li class="d-flex justify-content-between fw-bold fs-5">
                <span>Total:</span>
                <span>$190.00</span>
              </li>
            </ul>
            <a href="#" class="btn btn-primary w-100 mb-2">Proceed to Checkout</a>
            <a href="#" class="btn btn-outline-secondary w-100">Continue Shopping</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>










<?php WebConfig::footer(); ?>








