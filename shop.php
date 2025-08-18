<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();


$products = products_oper::fetch_all_products();

?>

<section class="shop py-5">
  <div class="container">
    <!-- Header + Filters -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
      <h2 class="text-uppercase fw-bold mb-0">Shop Our Products</h2>
      
      <!-- Filters -->
      <div class="d-flex flex-wrap gap-3 align-items-center">
        <select class="form-select form-select-sm" aria-label="Filter by Category" style="min-width: 150px;">
          <option selected>All Categories</option>
         <?php
          foreach($categories as $category){
              echo '<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
          }
         ?>
        </select>

        <select class="form-select form-select-sm" aria-label="Sort by Price" style="min-width: 150px;">
          <option selected>Sort by Price</option>
          <option value="low-high">Low to High</option>
          <option value="high-low">High to Low</option>
        </select>
      </div>
    </div>

    <!-- Products grid -->
    <div class="row g-4">

      <div class="row g-4">
  <?php foreach ($products as $product): ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm position-relative overflow-hidden">
        
        <!-- Badge (only show if on Sale) -->
        <?php if (!empty($product['is_sale']) && $product['is_sale'] == 1): ?>
          <span class="badge bg-danger position-absolute top-0 start-0 m-2 text-uppercase">Sale</span>
        <?php endif; ?>

        <!-- Image with hover overlay -->
        <div class="position-relative overflow-hidden">
          <img src="uploads/<?php echo htmlspecialchars($product['image_path']); ?>" 
               class="card-img-top img-fluid" 
               alt="<?php echo htmlspecialchars($product['product_name']); ?>" 
               style="height: 220px; object-fit: cover;">

          <!-- Quick View button -->
          <a href="single_product.php?productid=<?php echo $product['product_id']; ?>" 
             class="btn btn-sm btn-primary position-absolute bottom-0 start-50 translate-middle-x mb-3 opacity-0 hover-opacity-100 transition">
            Quick View
          </a>
        </div>

        <!-- Card body -->
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-uppercase">
            <?php echo htmlspecialchars($product['product_name']); ?>
          </h5>
          
          <!-- Star rating -->
          <div class="mb-2">
            <small class="text-warning">
              <?php 
                $rating = isset($product['rating']) ? (int)$product['rating'] : 4; // default 4
                echo str_repeat("&#9733;", $rating) . str_repeat("&#9734;", 5 - $rating);
              ?>
            </small>
          </div>

          <!-- Price -->
          <p class="card-text fw-bold mb-3">
            $<?php echo number_format($product['price'], 2); ?>
          </p>
          
          <!-- Add to Cart -->
           <?php
            if(isset($_SESSION['user'])){
               ?>
              <button class="btn btn-primary mt-auto" href = "single_product.php?productid=<?php echo $product['product_id']; ?>">
                  Add to Cart
              </button>


               <?php
            }else{
              ?>
              <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#loginModal">
              Add to Cart
            </button>
              <?php
            }
           ?>
       </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


<!-- Login First Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-header border-0">
        <h5 class="modal-title w-100" id="loginModalLabel">Login Required</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="fs-5 mb-3">Please login first to add products to your cart.</p>
        <a href="auth/login.php" class="btn btn-primary">Go to Login</a>
      </div>
    </div>
  </div>
</div>

     

    

      <!-- Add more product cards as needed -->

    </div>
  </div>
</section>

<style>
  /* Hover effect for quick view button */
  .card .hover-opacity-100 {
    transition: opacity 0.3s ease;
  }
  .card:hover .hover-opacity-100 {
    opacity: 1 !important;
  }
</style>




<?php WebConfig::footer();?>

