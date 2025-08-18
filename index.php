<?php

include("includes/web_configs.php");
// require("require/products.php");

WebConfig::header();
WebConfig::navbar();


$products = products_oper::fetch_all_products();

// echo "<pre>";
// print_r($products);
// echo "</pre>";
// die();

?>

<!-- Carousel -->
<div id="mainCarousel" class="carousel slide small-carousel" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $i = 0;
    foreach (array_slice($products, 0, 5) as $product) {

      $productId = $product['product_id'] ?? 0; // product id
      ?>
      <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
        <a href="single_product.php?productid=<?php echo $productId; ?>">
          <img src="uploads/<?php echo htmlspecialchars($product['image_path'] ?? ""); ?>"
            class="d-block w-100 img-fluid rounded" style="height:400px; object-fit:cover;"
            alt="<?php echo htmlspecialchars($product['product_name'] ?? 'Product'); ?>">

          <!-- Caption with product name -->
          <div class="carousel-caption d-none d-md-block">
            <h2 class="fw-bold bg-dark bg-opacity-50 px-3 py-2 rounded">
              <?php echo htmlspecialchars($product['product_name'] ?? 'Product'); ?>
            </h2>
          </div>
        </a>
      </div>
      <?php
      $i++;
    }
    ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>





<!-- New Collections Carousel -->
<section class="bg-light py-5" id="new-collections">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-lg-8 text-center">
        <h1 class="fw-bold">New Collections</h1>
        <p class="text-muted">Discover our latest arrivals and fresh styles, crafted to keep you on trend.</p>
      </div>
    </div>

    <div id="collectionsCarousel" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-inner">
        <?php
        $chunks = array_chunk($products, 3); // ek slide me 3 products
        foreach ($chunks as $i => $chunk): ?>
          <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
            <div class="row">
              <?php foreach ($chunk as $product): ?>
                <div class="col-md-4">
                  <div class="card h-100 border-0 shadow-sm">
                    <a href="single_product.php?productid=<?php echo $product['product_id']; ?>">
                      <img src="uploads/<?php echo htmlspecialchars($product['image_path']); ?>" class="card-img-top"
                        style="height:600px; object-fit:cover;">
                    </a>
                    <div class="card-body text-center">
                      <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                      <p class="text-muted"><?php echo htmlspecialchars($product['description']); ?></p>
                      <a href="single_product.php?productid=<?php echo $product['product_id']; ?>"
                        class="btn btn-outline-primary btn-sm">
                        Discover Now
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#collectionsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#collectionsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>







<!--winter collection-->
<section class="collection bg-light position-relative py-5">
  <div class="container">
    <!-- Title -->
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-uppercase">New Winter Collection</h2>
      <p class="text-muted">Discover our exclusive range for the season</p>
    </div>

    <div class="row align-items-center g-4">
      <?php
      // sirf last 1 ya 2 products uthao (ya jitne tum chaho)
      $winterProducts = array_slice($products, -1);

      foreach ($winterProducts as $product): ?>
        <!-- Image -->
        <div class="col-md-6" data-aos="fade-right">
          <a href="single_product.php?productid=<?php echo $product['product_id']; ?>">
            <img src="uploads/<?php echo htmlspecialchars($product['image_path']); ?>"
              alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="img-fluid rounded shadow-sm"
              style="max-height: 600px; object-fit: cover;">
          </a>
        </div>

        <!-- Content -->
        <div class="col-md-6 bg-white p-4 rounded shadow-sm" data-aos="fade-left">
          <h3 class="fw-bold text-uppercase mb-3">
            <?php echo htmlspecialchars($product['product_name']); ?>
          </h3>
          <p class="text-muted mb-4">
            <?php echo htmlspecialchars($product['description']); ?>
          </p>
          <a href="single_product.php?productid=<?php echo $product['product_id']; ?>"
            class="btn btn-dark btn-lg">Discover Now</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>



<!--Best Selling Items -->
<section id="best-sellers" class="py-5 bg-light">
  <div class="container">
    <!-- Title Row -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
      <h4 class="text-uppercase mb-0">Best Selling Items</h4>
      <a href="shop.php?" class="btn btn-link">View All Products</a>
    </div>

    <!-- Bootstrap Carousel -->
    <div id="bestSellersCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php
        // top 6 ya jitne best-selling chahiye wo le lo
        // maan lo tumhare products array mai sab products hain
        $bestProducts = array_slice($products, 0, 6);

        // chunk into groups of 3 per slide
        $chunks = array_chunk($bestProducts, 3);
        $active = "active";

        foreach ($chunks as $chunk): ?>
          <div class="carousel-item <?php echo $active; ?>">
            <div class="row g-4">
              <?php foreach ($chunk as $product): ?>
                <div class="col-md-4">
                  <div class="card border-0 shadow-sm h-100">
                    <a href="single_product.php?productid=<?php echo $product['product_id']; ?>">
                      <img src="uploads/<?php echo htmlspecialchars($product['image_path']); ?>" class="card-img-top"
                        alt="<?php echo htmlspecialchars($product['product_name']); ?>"
                        style="height: 550px; object-fit: cover;">
                    </a>
                    <div class="card-body text-center">
                      <h5 class="text-uppercase fs-6">
                        <?php echo htmlspecialchars($product['product_name']); ?>
                      </h5>
                      <p class="fw-bold mb-0">
                        $<?php echo number_format($product['price'], 2); ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php
          $active = ""; // sirf pehle slide active hogi
        endforeach; ?>

      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#bestSellersCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#bestSellersCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>


<!--insta video-->
<section class="py-5 bg-light">
  <div class="container text-center">
    <!-- Section Heading -->
    <h2 class="fw-bold mb-4">Watch Our Latest Collection Video</h2>

    <!-- Video Thumbnail with Play Button -->
    <div class="position-relative d-inline-block" style="max-width: 700px;">
      <!-- Thumbnail -->
      <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=1200&q=80" alt="Video Thumbnail"
        class="img-fluid rounded shadow">

      <!-- Play Button -->
      <a href="https://www.youtube.com/embed/pjtsGzQjFM4"
        class="btn btn-light rounded-circle position-absolute top-50 start-50 translate-middle p-3 shadow"
        data-bs-toggle="modal" data-bs-target="#videoModal">
        <i class="bi bi-play-fill fs-2 text-dark"></i>
      </a>
    </div>
  </div>
</section>

<!-- Bootstrap Modal for Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark border-0">
      <div class="ratio ratio-16x9">
        <iframe src="" id="videoFrame" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>


<!--you may like this-->
<section id="related-products" class="py-5 bg-light">
  <div class="container">
    <!-- Section Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
      <h4 class="text-uppercase mb-0">You May Also Like</h4>
      <a href="shop.php" class="btn btn-link">View All Products</a>
    </div>

    <!-- Bootstrap Carousel -->
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php
        // last 6 products table se nikal lo
        $relatedProducts = array_slice($products, -6);

        // unhe 3-3 k groups me tod do
        $chunks = array_chunk($relatedProducts, 3);
        $active = "active";

        foreach ($chunks as $chunk): ?>
          <div class="carousel-item <?php echo $active; ?>">
            <div class="row g-4">
              <?php foreach ($chunk as $product): ?>
                <div class="col-md-4 d-flex">
                  <div class="card flex-fill text-center" style="min-height: 420px; display: flex; flex-direction: column;">
                    <a href="single_product.php?productid=<?php echo $product['product_id']; ?>">
                      <img src="uploads/<?php echo htmlspecialchars($product['image_path']); ?>"
                        class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($product['product_name']); ?>"
                        style="height: 300px; object-fit: cover;">
                    </a>
                    <div class="card-body mt-auto">
                      <h5 class="card-title text-uppercase">
                        <?php echo htmlspecialchars($product['product_name']); ?>
                      </h5>
                      <p class="fw-bold">$<?php echo number_format($product['price'], 2); ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php
          $active = ""; // sirf pehli slide active hogi
        endforeach; ?>

      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>



<!--Blogs-->
<section class="blog py-5">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">Read Blog Posts</h4>
      <a href="index.html" class="btn btn-link p-0">View All</a>
    </div>
    <div class="row g-4">

      <div class="col-md-4">
        <article class="card h-100 border-0">
          <a href="index.html" class="d-block overflow-hidden">
            <img src="https://images.unsplash.com/photo-1503342452485-86a118d45f09?auto=format&fit=crop&w=600&q=80"
              alt="fashion pastel" class="card-img-top img-fluid" style="object-fit: cover; height: 220px;">
          </a>
          <div class="card-body px-0 pt-3">
            <div class="text-uppercase fs-6 text-secondary mb-2">
              <span>Fashion /</span>
              <span> Jul 11, 2022</span>
            </div>
            <h5 class="card-title text-uppercase">
              <a href="index.html" class="stretched-link text-decoration-none text-dark">
                How to look outstanding in pastel
              </a>
            </h5>
            <p class="card-text text-truncate" style="max-height: 4.5rem;">
              Dignissim lacus, turpis ut suspendisse vel tellus. Turpis purus, gravida orci, fringilla...
            </p>
          </div>
        </article>
      </div>

      <div class="col-md-4">
        <article class="card h-100 border-0">
          <a href="index.html" class="d-block overflow-hidden">
            <img src="https://images.unsplash.com/photo-1521334884684-d80222895322?auto=format&fit=crop&w=600&q=80"
              alt="summer fashion" class="card-img-top img-fluid" style="object-fit: cover; height: 220px;">
          </a>
          <div class="card-body px-0 pt-3">
            <div class="text-uppercase fs-6 text-secondary mb-2">
              <span>Fashion /</span>
              <span> Jul 11, 2022</span>
            </div>
            <h5 class="card-title text-uppercase">
              <a href="index.html" class="stretched-link text-decoration-none text-dark">
                Top 10 fashion trend for summer
              </a>
            </h5>
            <p class="card-text text-truncate" style="max-height: 4.5rem;">
              Turpis purus, gravida orci, fringilla dignissim lacus, turpis ut suspendisse vel tellus...
            </p>
          </div>
        </article>
      </div>

      <div class="col-md-4">
        <article class="card h-100 border-0">
          <a href="index.html" class="d-block overflow-hidden">
            <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?auto=format&fit=crop&w=600&q=80"
              alt="unique fashion moment" class="card-img-top img-fluid" style="object-fit: cover; height: 220px;">
          </a>
          <div class="card-body px-0 pt-3">
            <div class="text-uppercase fs-6 text-secondary mb-2">
              <span>Fashion /</span>
              <span> Jul 11, 2022</span>
            </div>
            <h5 class="card-title text-uppercase">
              <a href="index.html" class="stretched-link text-decoration-none text-dark">
                Crazy fashion with unique moment
              </a>
            </h5>
            <p class="card-text text-truncate" style="max-height: 4.5rem;">
              Turpis purus, gravida orci, fringilla dignissim lacus, turpis ut suspendisse vel tellus...
            </p>
          </div>
        </article>
      </div>

    </div>
  </div>
</section>


<!--instagram section-->

<section class="logo-bar py-5 my-5">
  <div class="container text-center">
    <div class="mb-4">
      <h5 class="fw-bold text-uppercase">Visit Our Insta</h5>
    </div>
    <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">
      <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png" alt="Apple" class="img-fluid"
        style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft"
        class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Google_logo_2015.png" alt="Google" class="img-fluid"
        style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Stack_Overflow_logo.svg" alt="Stack Overflow"
        class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Twitter_logo.svg" alt="Twitter" class="img-fluid"
        style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook"
        class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/8/81/Instagram_logo_2016.svg" alt="Instagram"
        class="img-fluid" style="max-height: 50px;">
    </div>
  </div>
</section>


<!-- Newsletter Section -->
<section class="bg-light py-5">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-3">Subscribe to Our Newsletter</h2>
        <p class="text-muted mb-4">
          Get the latest updates on new products, special offers, and exclusive discounts directly to your inbox.
        </p>
        <form class="row g-2 justify-content-center" method="POST" action="subscribe.php">
          <div class="col-sm-8 col-md-6">
            <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
          </div>
          <div class="col-sm-auto">
            <button type="submit" class="btn btn-primary px-4">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>



<?php WebConfig::footer(); ?>