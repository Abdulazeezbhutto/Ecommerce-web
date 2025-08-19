<?php

include("includes/web_configs.php");
// include("require/products.php");

WebConfig::header();
WebConfig::navbar();

$product = products_oper::fetch_product_by_id($_REQUEST['productid'] ?? 0);

?>

<section class="single-product py-5">
  <div class="container">
    <div class="row gy-4">
      
        <p id="result"></p>

      <!-- Product Images -->
      <div class="col-md-6">
        <img id="mainImage" src="uploads/<?php echo $product['image_path'] ?? '' ?>" alt="Product" class="img-fluid rounded mb-3" style="height: 450px; object-fit: cover; width: 100%;">
      </div>
      
      <!-- Product Details -->
      <div class="col-md-6">
        <h2 class="text-uppercase fw-bold"><?php echo $product['product_name'] ?? '' ?></h2>
        <div class="d-flex align-items-center gap-3 mb-3">
          <div class="text-warning fs-5">
            &#9733;&#9733;&#9733;&#9733;&#9734;
          </div>
          <span class="badge bg-success text-uppercase">
            <?php echo (!empty($product['stock_quamtitiy']) && $product['stock_quamtitiy'] > 0) ? "In Stock" : "Out of Stock"; ?>
          </span>
        </div>
        <h3 class="text-primary fw-bold mb-4">$<?php echo $product['price'] ?? "" ?></h3>
        <p><?php echo $product['description'] ?? "" ?></p>
        <ul>
          <li>100% UV protection</li>
          <li>Lightweight and durable frame</li>
          <li>Available in multiple colors</li>
          <li>One size fits most</li>
        </ul>

        <!-- Add to Cart Form -->
        <form class="d-flex align-items-center gap-3 mt-4" action="" method="POST">
          <label for="quantity" class="form-label mb-0 fw-semibold">
            Quantity: <?php echo $product['stock_quamtitiy'] ?? 0; ?>
          </label>

          <input type="number" 
                 id="quantity" 
                 name="quantity" 
                 class="form-control" 
                 value="1" 
                 min="1" 
                 max="<?php echo $product['stock_quamtitiy'] ?? 1; ?>" 
                 style="width: 80px;"
                 <?php echo (empty($product['stock_quamtitiy']) || $product['stock_quamtitiy'] <= 0) ? 'disabled' : ''; ?>>

          <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?? "" ?>">
          
          <?php if (isset($_SESSION['user'])) { ?>
            <button type="button" class="btn btn-primary mt-auto" 
                    onclick="addToCart(
                        <?php echo $product['product_id']; ?>, 
                        <?php echo $_SESSION['user']['user_id']; ?>,
                        <?php echo $product['price']; ?>,
                        '<?php echo addslashes($product['image_path']); ?>',
                        '<?php echo addslashes($product['product_name']); ?>',
                        document.getElementById('quantity').value
                    )"
                    <?php echo (empty($product['stock_quamtitiy']) || $product['stock_quamtitiy'] <= 0) ? 'disabled' : ''; ?>>
                Add to Cart
            </button>
          <?php } else { ?>
            <!-- Guest: show login modal -->
            <button type="button" class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#loginModal"
              <?php echo (empty($product['stock_quamtitiy']) || $product['stock_quamtitiy'] <= 0) ? 'disabled' : ''; ?>>
              Add to Cart
            </button>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  // Thumbnail click changes main image
  document.querySelectorAll('.product-thumb').forEach(thumb => {
    thumb.addEventListener('click', () => {
      document.querySelectorAll('.product-thumb').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
      document.getElementById('mainImage').src = thumb.src.replace('w=150', 'w=600');
    });
  });
</script>

<!-- Login Modal -->
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

<?php WebConfig::footer(); ?>
