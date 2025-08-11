
<?php

include("includes/web_configs.php");

WebConfig::header();
WebConfig::navbar();





?>


<section class="single-product py-5">
  <div class="container">
    <div class="row gy-4">
      
      <!-- Product Images -->
      <div class="col-md-6">
        <img id="mainImage" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=600&q=80" alt="Product" class="img-fluid rounded mb-3" style="height: 450px; object-fit: cover; width: 100%;">
        <div class="d-flex gap-2">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=150&q=80" alt="Thumb 1" class="img-thumbnail product-thumb active" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
          <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=150&q=80" alt="Thumb 2" class="img-thumbnail product-thumb" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
          <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?auto=format&fit=crop&w=150&q=80" alt="Thumb 3" class="img-thumbnail product-thumb" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
        </div>
      </div>
      
      <!-- Product Details -->
      <div class="col-md-6">
        <h2 class="text-uppercase fw-bold">Stylish Sunglasses</h2>
        <div class="d-flex align-items-center gap-3 mb-3">
          <div class="text-warning fs-5">
            &#9733;&#9733;&#9733;&#9733;&#9734;
          </div>
          <span class="badge bg-success text-uppercase">In Stock</span>
        </div>
        <h3 class="text-primary fw-bold mb-4">$49.99</h3>
        <p>Experience stylish comfort with these sleek sunglasses featuring UV protection and a lightweight frame — perfect for any occasion.</p>
        <ul>
          <li>100% UV protection</li>
          <li>Lightweight and durable frame</li>
          <li>Available in multiple colors</li>
          <li>One size fits most</li>
        </ul>
        <form class="d-flex align-items-center gap-3 mt-4">
          <label for="quantity" class="form-label mb-0 fw-semibold">Quantity:</label>
          <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" style="width: 80px;">
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


