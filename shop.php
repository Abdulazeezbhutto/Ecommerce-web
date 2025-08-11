<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





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
          <option>Electronics</option>
          <option>Fashion</option>
          <option>Home & Living</option>
          <option>Accessories</option>
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

      <!-- Product Card -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm position-relative overflow-hidden">
          <!-- Badge -->
          <span class="badge bg-danger position-absolute top-0 start-0 m-2 text-uppercase">Sale</span>
          <!-- Image with hover overlay -->
          <div class="position-relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=600&q=80" 
                 class="card-img-top img-fluid" alt="Stylish Sunglasses" style="height: 220px; object-fit: cover;">
            <a href="single_product.php" class="btn btn-sm btn-primary position-absolute bottom-0 start-50 translate-middle-x mb-3 opacity-0 hover-opacity-100 transition">
              Quick View
            </a>
          </div>

          <!-- Card body -->
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-uppercase">Stylish Sunglasses</h5>
            <div class="mb-2">
              <!-- Star rating -->
              <small class="text-warning">
                &#9733;&#9733;&#9733;&#9733;&#9734;
              </small>
            </div>
            <p class="card-text fw-bold mb-3">$49.99</p>
            <button class="btn btn-primary mt-auto">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Product Card -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm position-relative overflow-hidden">
          <span class="badge bg-success position-absolute top-0 start-0 m-2 text-uppercase">New</span>
          <div class="position-relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=600&q=80" 
                 class="card-img-top img-fluid" alt="Casual Sneakers" style="height: 220px; object-fit: cover;">
            <a href="single_product.php" class="btn btn-sm btn-primary position-absolute bottom-0 start-50 translate-middle-x mb-3 opacity-0 hover-opacity-100 transition">
              Quick View
            </a>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-uppercase">Casual Sneakers</h5>
            <div class="mb-2">
              <small class="text-warning">
                &#9733;&#9733;&#9733;&#9734;&#9734;
              </small>
            </div>
            <p class="card-text fw-bold mb-3">$79.99</p>
            <button class="btn btn-primary mt-auto">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Product Card -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm position-relative overflow-hidden">
          <div class="position-relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?auto=format&fit=crop&w=600&q=80" 
                 class="card-img-top img-fluid" alt="Leather Handbag" style="height: 220px; object-fit: cover;">
            <a href="single_product.php" class="btn btn-sm btn-primary position-absolute bottom-0 start-50 translate-middle-x mb-3 opacity-0 hover-opacity-100 transition">
              Quick View
            </a>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-uppercase">Leather Handbag</h5>
            <div class="mb-2">
              <small class="text-warning">
                &#9733;&#9733;&#9733;&#9733;&#9733;
              </small>
            </div>
            <p class="card-text fw-bold mb-3">$120.00</p>
            <button class="btn btn-primary mt-auto">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Product Card -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm position-relative overflow-hidden">
          <span class="badge bg-danger position-absolute top-0 start-0 m-2 text-uppercase">Sale</span>
          <div class="position-relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=600&q=80" 
                 class="card-img-top img-fluid" alt="Modern Watch" style="height: 220px; object-fit: cover;">
            <a href="single_product.php" class="btn btn-sm btn-primary position-absolute bottom-0 start-50 translate-middle-x mb-3 opacity-0 hover-opacity-100 transition">
              Quick View
            </a>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-uppercase">Modern Watch</h5>
            <div class="mb-2">
              <small class="text-warning">
                &#9733;&#9733;&#9733;&#9733;&#9734;
              </small>
            </div>
            <p class="card-text fw-bold mb-3">$150.00</p>
            <button class="btn btn-primary mt-auto">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Add more product cards as needed -->

    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation" class="mt-5 d-flex justify-content-center">
      <ul class="pagination pagination-sm mb-0">
        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
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

