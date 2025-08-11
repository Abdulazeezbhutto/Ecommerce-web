<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





?>

  <!-- Carousel -->
  <div id="mainCarousel" class="carousel slide small-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1200&h=350&fit=crop" class="d-block w-100"
          alt="Sale">
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1521334884684-d80222895322?w=1200&h=350&fit=crop"
          class="d-block w-100" alt="New Arrivals">
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=1200&h=350&fit=crop"
          class="d-block w-100" alt="Best Deals">
      </div>
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
          <p class="text-muted">
            Discover our latest arrivals and fresh styles, crafted to keep you on trend.
          </p>
        </div>
      </div>

      <div id="collectionsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="row g-4">
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Soft Leather Jackets</h5>
                    <p class="text-muted">Scelerisque duis aliquam qui lorem ipsum dolor amet.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="https://images.unsplash.com/photo-1521334884684-d80222895322?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Elegant Sweater</h5>
                    <p class="text-muted">Scelerisque duis aliquam qui lorem ipsum dolor amet.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                  <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Leather Backpack</h5>
                    <p class="text-muted">Scelerisque duis aliquam qui lorem ipsum dolor amet.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="row g-4">
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                  <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Casual Sneakers</h5>
                    <p class="text-muted">Perfect blend of comfort and style.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                  <img src="https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Stylish Watch</h5>
                    <p class="text-muted">Timeless design for modern living.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                  <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Modern Sunglasses</h5>
                    <p class="text-muted">Enhance your look in every season.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

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

  <!-- Our New Arivals -->
  <section class="bg-light py-5" id="new-collections">
    <div class="container">
       <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
      <h4 class="text-uppercase mb-0"></h4>
      <a href="index.html" class="btn btn-link">View All Products</a>
    </div>
      <!-- Section Title -->
      <div class="row justify-content-center mb-4">
        <div class="col-lg-8 text-center">
          <h1 class="fw-bold">Our New Arivals </h1>
          <p class="text-muted">
            Discover our latest arrivals and fresh styles, crafted to keep you on trend.
          </p>
        </div>
      </div>

      <!-- Carousel -->
      <div id="newCollectionsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="row g-4">
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" alt="Soft Leather Jackets" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Soft Leather Jackets</h5>
                    <p class="card-text text-muted">Perfectly crafted leather jackets for every occasion.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="https://images.unsplash.com/photo-1521334884684-d80222895322?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" alt="Elegant Sweater" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Elegant Sweater</h5>
                    <p class="card-text text-muted">Stay warm and stylish with our premium knitwear.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                  <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" alt="Leather Backpack" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Leather Backpack</h5>
                    <p class="card-text text-muted">Carry your essentials in style with our leather backpacks.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="row g-4">
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="https://images.unsplash.com/photo-1530845643012-01b1d18b2a8f?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" alt="Denim Jacket" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Denim Jacket</h5>
                    <p class="card-text text-muted">Timeless denim jackets for casual cool looks.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="https://images.unsplash.com/photo-1576569421814-d077e5772cda?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" alt="Summer Dress" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Summer Dress</h5>
                    <p class="card-text text-muted">Light and breezy dresses perfect for sunny days.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                  <img
                    src="https://images.unsplash.com/photo-1618354691373-8c0c7a00d0f3?auto=format&fit=crop&w=500&q=80"
                    class="card-img-top" alt="Stylish Sneakers" style="height: 350px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">Stylish Sneakers</h5>
                    <p class="card-text text-muted">Step into comfort and style with our sneaker collection.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Discover Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#newCollectionsCarousel"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#newCollectionsCarousel"
          data-bs-slide="next">
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

      <!-- Collection Row -->
      <div class="row align-items-center g-4">

        <!-- Image -->
        <div class="col-md-6" data-aos="fade-right">
          <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246" alt="Winter Collection"
            class="img-fluid rounded shadow-sm" style="max-height: 500px; object-fit: cover;">
        </div>

        <!-- Content -->
        <div class="col-md-6 bg-white p-4 rounded shadow-sm" data-aos="fade-center">
          <h3 class="fw-bold text-uppercase mb-3">Classic Winter Collection</h3>
          <p class="text-muted mb-4">
            Elevate your style this season with our premium selection of coats, sweaters, and accessories.
            Designed for comfort, warmth, and timeless fashion appeal. From elegant outerwear to cozy knits,
            each piece is crafted to keep you stylish and comfortable all winter long.
          </p>
          <a href="#" class="btn btn-dark btn-lg">Shop Now</a>
        </div>

      </div>
    </div>
  </section>


  <!--Best Selling Items -->
  <section id="best-sellers" class="py-5 bg-light">
    <div class="container">
      <!-- Title Row -->
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h4 class="text-uppercase mb-0">Best Selling Items</h4>
        <a href="index.html" class="btn btn-link">View All Products</a>
      </div>

      <!-- Bootstrap Carousel -->
      <div id="bestSellersCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <!-- First Slide -->
          <div class="carousel-item active">
            <div class="row g-4">
              <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                  <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246" class="card-img-top"
                    alt="Dark florish onepiece" style="height: 450px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="text-uppercase fs-6">Dark florish onepiece</h5>
                    <p class="fw-bold mb-0">$95.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                  <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c" class="card-img-top"
                    alt="Baggy Shirt" style="height: 450px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="text-uppercase fs-6">Baggy Shirt</h5>
                    <p class="fw-bold mb-0">$55.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                  <img src="https://images.unsplash.com/photo-1520975922071-a36d61a23670" class="card-img-top"
                    alt="Cotton off-white shirt" style="height: 450px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="text-uppercase fs-6">Cotton off-white shirt</h5>
                    <p class="fw-bold mb-0">$65.00</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Second Slide -->
          <div class="carousel-item">
            <div class="row g-4">
              <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                  <img src="https://images.unsplash.com/photo-1618354691373-d851c5c41d7a" class="card-img-top"
                    alt="Handmade crop sweater" style="height: 450px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="text-uppercase fs-6">Handmade crop sweater</h5>
                    <p class="fw-bold mb-0">$50.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                  <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357" class="card-img-top"
                    alt="Dark florish onepiece" style="height: 450px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="text-uppercase fs-6">Dark florish onepiece</h5>
                    <p class="fw-bold mb-0">$70.00</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                  <img src="https://images.unsplash.com/photo-1520975922071-a36d61a23670" class="card-img-top"
                    alt="Cotton off-white shirt" style="height: 450px; object-fit: cover;">
                  <div class="card-body text-center">
                    <h5 class="text-uppercase fs-6">Cotton off-white shirt</h5>
                    <p class="fw-bold mb-0">$70.00</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
      <a href="index.html" class="btn btn-link">View All Products</a>
    </div>

    <!-- Bootstrap Carousel -->
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <!-- First Slide -->
        <div class="carousel-item active">
          <div class="row g-4">
            <div class="col-md-4 d-flex">
              <div class="card flex-fill text-center" style="min-height: 420px; display: flex; flex-direction: column;">
                <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500&q=80" 
                     class="card-img-top img-fluid" 
                     alt="product" 
                     style="height: 300px; object-fit: cover;">
                <div class="card-body mt-auto">
                  <h5 class="card-title text-uppercase">Dark florish onepiece</h5>
                  <p class="fw-bold">$95.00</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 d-flex">
              <div class="card flex-fill text-center" style="min-height: 420px; display: flex; flex-direction: column;">
                <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=500&q=80" 
                     class="card-img-top img-fluid" 
                     alt="product" 
                     style="height: 300px; object-fit: cover;">
                <div class="card-body mt-auto">
                  <h5 class="card-title text-uppercase">Baggy Shirt</h5>
                  <p class="fw-bold">$55.00</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 d-flex">
              <div class="card flex-fill text-center" style="min-height: 420px; display: flex; flex-direction: column;">
                <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=500&q=80" 
                     class="card-img-top img-fluid" 
                     alt="product" 
                     style="height: 300px; object-fit: cover;">
                <div class="card-body mt-auto">
                  <h5 class="card-title text-uppercase">Cotton off-white shirt</h5>
                  <p class="fw-bold">$65.00</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Second Slide -->
        <div class="carousel-item">
          <div class="row g-4">
            <div class="col-md-4 d-flex">
              <div class="card flex-fill text-center" style="min-height: 420px; display: flex; flex-direction: column;">
                <img src="https://images.unsplash.com/photo-1514996937319-344454492b37?w=500&q=80" 
                     class="card-img-top img-fluid" 
                     alt="product" 
                     style="height: 300px; object-fit: cover;">
                <div class="card-body mt-auto">
                  <h5 class="card-title text-uppercase">Handmade crop sweater</h5>
                  <p class="fw-bold">$50.00</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 d-flex">
              <div class="card flex-fill text-center" style="min-height: 420px; display: flex; flex-direction: column;">
                <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=500&q=80" 
                     class="card-img-top img-fluid" 
                     alt="product" 
                     style="height: 300px; object-fit: cover;">
                <div class="card-body mt-auto">
                  <h5 class="card-title text-uppercase">Handmade crop sweater</h5>
                  <p class="fw-bold">$70.00</p>
                </div>
              </div>
            </div>

            <div class="col-md-4 d-flex">
              <div class="card flex-fill text-center" style="min-height: 420px; display: flex; flex-direction: column;">
                <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=500&q=80" 
                     class="card-img-top img-fluid" 
                     alt="product" 
                     style="height: 300px; object-fit: cover;">
                <div class="card-body mt-auto">
                  <h5 class="card-title text-uppercase">Winter Hoodie</h5>
                  <p class="fw-bold">$85.00</p>
                </div>
              </div>
            </div>
          </div>
        </div>

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
                 alt="fashion pastel" 
                 class="card-img-top img-fluid" 
                 style="object-fit: cover; height: 220px;">
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
                 alt="summer fashion" 
                 class="card-img-top img-fluid" 
                 style="object-fit: cover; height: 220px;">
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
                 alt="unique fashion moment" 
                 class="card-img-top img-fluid" 
                 style="object-fit: cover; height: 220px;">
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
      <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png" alt="Apple" class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft" class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Google_logo_2015.png" alt="Google" class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Stack_Overflow_logo.svg" alt="Stack Overflow" class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Twitter_logo.svg" alt="Twitter" class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" class="img-fluid" style="max-height: 50px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/8/81/Instagram_logo_2016.svg" alt="Instagram" class="img-fluid" style="max-height: 50px;">
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
          <form class="row g-2 justify-content-center">
            <div class="col-sm-8 col-md-6">
              <input type="email" class="form-control" placeholder="Enter your email" required>
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
  