<?php

include("includes/web_configs.php");


WebConfig::header();
WebConfig::navbar();


$category_id = isset($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : "";
$query = "SELECT * FROM products WHERE category_id = $category_id";
$result = mysqli_query($connection->connection, $query);


?>


<!-- Category Header + Breadcrumb -->
<section class="category-header py-4 bg-light">
  <div class="container">
    <nav aria-label="breadcrumb" class="mb-2">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['name']??""?></li>
        <!-- <li class="breadcrumb-item active" aria-current="page">category</li> -->
      </ol>
    </nav>
  
    <p class="text-muted">Explore our latest collection of fashion products. Stay trendy and stylish with our handpicked items.</p>
  </div>
</section>

<!-- Main Content -->
<section class="category-content py-5">
  <div class="container">
    <div class="row">

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

          <?php
              if(mysqli_num_rows($result) > 0){

                while($row=mysqli_fetch_assoc($result)){
                  ?>
                  <div class="col-sm-6 col-md-4">
                      <div class="card h-100 shadow-sm">
                        <img src="uploads/<?php echo $row['image_path']?>" class="card-img-top" alt="Product 1" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                          <h6 class="card-title text-uppercase"><?php echo $row['product_name']?></h6>
                          <p class="fw-bold mb-2">$<?php echo $row['price']?></p>
                          <a href="single_product.php?productid=<?php echo $row['product_id']; ?>" class="btn btn-outline-primary mt-auto">View Details</a>
                        </div>
                      </div>
                    </div>
                  
                  
                  <?php

                }

                }
          
          ?>
          
        </div>
      </main>
    </div>
  </div>
</section>




<?php WebConfig::footer();?>
