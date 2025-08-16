
<?php

include("includes/web_configs.php");
// include("require/products.php");



WebConfig::header();
WebConfig::navbar();


$product = products_oper::fetch_product_by_id($_REQUEST['productid'] ?? 0);

echo "<pre>";
print_r($product);
echo "</pre>";



?>


<section class="single-product py-5">
  <div class="container">
    <div class="row gy-4">
      
      <!-- Product Images -->
      <div class="col-md-6">
        <img id="mainImage" src="uploads/<?php echo $product['image_path']??''?>" alt="Product" class="img-fluid rounded mb-3" style="height: 450px; object-fit: cover; width: 100%;">
      </div>
      
      <!-- Product Details -->
      <div class="col-md-6">
        <h2 class="text-uppercase fw-bold"><?php echo $product['product_name'] ?? '' ?></h2>
        <div class="d-flex align-items-center gap-3 mb-3">
          <div class="text-warning fs-5">
            &#9733;&#9733;&#9733;&#9733;&#9734;
          </div>
          <span class="badge bg-success text-uppercase"><?php echo $product['stock_quamtitiy'] > 0 ? "In Stock":"Out of Stock";?></span>
        </div>
      <h3 class="text-primary fw-bold mb-4">$<?php echo $product['price']??"" ?></h3>
        <p><?php echo $product['description']??""?></p>
        <ul>
          <li>100% UV protection</li>
          <li>Lightweight and durable frame</li>
          <li>Available in multiple colors</li>
          <li>One size fits most</li>
        </ul>
        <form class="d-flex align-items-center gap-3 mt-4" action = "cart.php" method = "POST">
          <label for="quantity" class="form-label mb-0 fw-semibold">Quantity:</label>
          <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" style="width: 80px;">
          <input type="hidden" name = "product_id" value = "<?php echo $product['product_id']??""?>">
          <button type="submit" class="btn btn-primary px-4">Add to Cart</button>
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

















<?php WebConfig::footer();?>


