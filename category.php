<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





?>


<!-- Category Header + Breadcrumb -->
<section class="category-header py-4 bg-light">
  <div class="container">
    <nav aria-label="breadcrumb" class="mb-2">
      <ol class="breadcrumb mb-0">
        
        <li class="breadcrumb-item active" aria-current="page">category</li>
      </ol>
    </nav>
    <h2 class="fw-bold">Fashion</h2>
    <p class="text-muted">Explore our latest collection of fashion products. Stay trendy and stylish with our handpicked items.</p>
  </div>
</section>

<!-- Main Content -->
<section class="category-content py-5">
  <div class="container">
    <div class="row">

      <!-- Sidebar Filters -->
      <aside class="col-lg-3 mb-4">
        <h5 class="fw-bold mb-3">Filter By</h5>

        <div class="mb-4">
          <h6>Price</h6>
          <form>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="price" id="price1" />
              <label class="form-check-label" for="price1">Under $50</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="price" id="price2" />
              <label class="form-check-label" for="price2">$50 to $100</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="price" id="price3" />
              <label class="form-check-label" for="price3">Above $100</label>
            </div>
          </form>
        </div>

        <div class="mb-4">
          <h6>Brand</h6>
          <form>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="brand1" />
              <label class="form-check-label" for="brand1">Brand A</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="brand2" />
              <label class="form-check-label" for="brand2">Brand B</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="brand3" />
              <label class="form-check-label" for="brand3">Brand C</label>
            </div>
          </form>
        </div>

        <button class="btn btn-primary w-100">Apply Filters</button>
      </aside>

      <!-- Products + Sorting + Pagination -->
      <main class="col-lg-9">
        <!-- Sorting -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <p class="mb-0">Showing 1–12 of 100 results</p>
          <select class="form-select w-auto" aria-label="Sort products">
            <option selected>Sort by: Popularity</option>
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="newest">Newest Arrivals</option>
          </select>
        </div>

        <!-- Product Grid -->
        <div class="row g-4">
          <!-- Product Card 1 -->
          <div class="col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Product 1" style="height: 220px; object-fit: cover;">
              <div class="card-body d-flex flex-column">
                <h6 class="card-title text-uppercase">Casual Sneakers</h6>
                <p class="fw-bold mb-2">$79.99</p>
                <a href="#" class="btn btn-outline-primary mt-auto">View Details</a>
              </div>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Product 2" style="height: 220px; object-fit: cover;">
              <div class="card-body d-flex flex-column">
                <h6 class="card-title text-uppercase">Modern Watch</h6>
                <p class="fw-bold mb-2">$150.00</p>
                <a href="#" class="btn btn-outline-primary mt-auto">View Details</a>
              </div>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Product 3" style="height: 220px; object-fit: cover;">
              <div class="card-body d-flex flex-column">
                <h6 class="card-title text-uppercase">Stylish Sunglasses</h6>
                <p class="fw-bold mb-2">$49.99</p>
                <a href="#" class="btn btn-outline-primary mt-auto">View Details</a>
              </div>
            </div>
          </div>

          <!-- Add more product cards as needed -->

        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </main>
    </div>
  </div>
</section>




<?php WebConfig::footer();?>
