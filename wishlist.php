
<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





?>


<!-- Wishlist Section -->
<section class="wishlist-section py-5">
  <div class="container">
    <h2 class="mb-4">Your Wishlist</h2>
    
    <!-- If wishlist has items -->
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col" class="text-center">Price</th>
            <th scope="col" class="text-center">Quantity</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Wishlist Item 1 -->
          <tr>
            <td class="d-flex align-items-center gap-3">
              <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&fit=crop&w=80&q=80" alt="Product 1" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
              <div>
                <h6 class="mb-1">Classic Baggy Shirt</h6>
                <small class="text-muted">Brand: FashionCo</small>
              </div>
            </td>
            <td class="text-center fw-bold">$55.00</td>
            <td class="text-center">
              <input type="number" class="form-control form-control-sm" value="1" min="1" style="width: 70px; margin: auto;">
            </td>
            <td class="text-center">
              <button class="btn btn-success btn-sm mb-1 w-100">Add to Cart</button>
              <button class="btn btn-outline-danger btn-sm w-100">Remove</button>
            </td>
          </tr>
          
          <!-- Wishlist Item 2 -->
          <tr>
            <td class="d-flex align-items-center gap-3">
              <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=80&q=80" alt="Product 2" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
              <div>
                <h6 class="mb-1">Cotton Off-white Shirt</h6>
                <small class="text-muted">Brand: StylePro</small>
              </div>
            </td>
            <td class="text-center fw-bold">$65.00</td>
            <td class="text-center">
              <input type="number" class="form-control form-control-sm" value="2" min="1" style="width: 70px; margin: auto;">
            </td>
            <td class="text-center">
              <button class="btn btn-success btn-sm mb-1 w-100">Add to Cart</button>
              <button class="btn btn-outline-danger btn-sm w-100">Remove</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- If wishlist is empty -->
    <div class="text-center my-5" id="empty-wishlist" style="display:none;">
      <h4>Your wishlist is empty.</h4>
      <a href="#" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
  </div>
</section>








<?php WebConfig::footer();?>


