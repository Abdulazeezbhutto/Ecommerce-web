<?php
include("includes/orders.php");
include("includes/admin_configs.php");

$orderResult = orders::getorderbyid($_REQUEST['id'], $connection);

// Grouped order data
$order = [];
$order['images'] = [];

while ($row = mysqli_fetch_assoc($orderResult)) {
  if (empty($order['order_id'])) {
    $order = [
      'order_id' => $row['order_id'],
      'user_id' => $row['user_id'],
      'order_Status' => $row['order_Status'],
      'total_ammount' => $row['total_ammount'],
      'payment_status' => $row['payment_status'],
      'shipping_Address' => $row['shipping_Address'],
      'payment_method' => $row['payment_method'],
      'placed_at' => $row['placed_at'],
      'updated_at' => $row['updated_at'],
      'images' => []
    ];
  }

  if (!empty($row['image_path'])) {
    $order['images'][] = $row['image_path'];
  }
}

admin_configs::header();
?>

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="mb-4 fw-bold text-primary text-center" data-aos="fade-down" data-aos-duration="800">
      🚀 Order Details
    </h2>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" data-aos="zoom-in" data-aos-duration="1000">
      <!-- Futuristic Gradient Header -->
      <div class="card-header text-white p-4" style="background: linear-gradient(135deg, #281f31ff 0%, #a6c0eeff 100%);"
        data-aos="fade-right" data-aos-duration="1200">
        <h4 class="mb-0">Order #<?php echo $order['order_id'] ?? ""; ?></h4>
      </div>

      <div class="card-body p-4">
        <div class="row g-4">
          <!-- Left Column -->
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <p class="mb-3"><i class="bi bi-person-circle text-primary"></i> <strong>User ID:</strong>
              <?php echo $order['user_id'] ?? ""; ?></p>

            <p class="mb-3">
              <i class="bi bi-bag-check-fill text-success"></i>
              <strong>Order Status:</strong>
            </p>
            <!-- Order Status Form -->
            <form action="update_order.php" method="POST" class="mb-3">
              <input type="hidden" name="order_id" value="<?php echo $order['order_id'] ?? ""; ?>">
              <select name="order_status" class="form-select w-50" onchange="this.form.submit()">
                <option value="Completed" <?php echo ($order['order_Status'] ?? "") == "Completed" ? "selected" : ""; ?>>Completed</option>
                <option value="Pending" <?php echo ($order['order_Status'] ?? "") == "Pending" ? "selected" : ""; ?>>Pending</option>
                <option value="Cancelled" <?php echo ($order['order_Status'] ?? "") == "Cancelled" ? "selected" : ""; ?>>Cancelled</option>
              </select>
            </form>

            <?php if (($order['order_Status'] ?? "") == "Completed") { ?>
              <span class="badge bg-success px-3 py-2">Completed</span>
            <?php } elseif (($order['order_Status'] ?? "") == "Pending") { ?>
              <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
            <?php } else { ?>
              <span class="badge bg-secondary px-3 py-2"><?php echo $order['order_Status'] ?? ""; ?></span>
            <?php } ?>

            <p class="mb-3 mt-3"><i class="bi bi-cash-stack text-info"></i> <strong>Total Amount:</strong>
              $<?php echo $order['total_ammount'] ?? ""; ?></p>
          </div>

          <!-- Right Column -->
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <p class="mb-3"><i class="bi bi-credit-card-2-front-fill text-danger"></i> <strong>Payment Method:</strong>
              <?php echo $order['payment_method']; ?></p>
            <p class="mb-3"><i class="bi bi-geo-alt-fill text-primary"></i> <strong>Shipping Address:</strong><br>
              <?php echo $order['shipping_Address']; ?></p>
          </div>
        </div>

        <hr class="my-4" data-aos="fade-left" data-aos-duration="800">

        <div class="row g-4 text-muted">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <p><i class="bi bi-calendar-event text-secondary"></i> <strong>Placed At:</strong>
              <?php echo $order['placed_at']; ?></p>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="800">
            <p><i class="bi bi-clock-history text-secondary"></i> <strong>Last Updated:</strong>
              <?php echo $order['updated_at']; ?></p>
          </div>
        </div>

        <hr class="my-4" data-aos="fade-up" data-aos-delay="1000">

        <!-- Images Section -->
        <div class="row g-3 mb-4">
          <?php foreach ($order['images'] as $img) { ?>
            <div class="col-md-3 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="200">
              <div class="card shadow-sm border-0 rounded-3 text-center">
                <img src="../uploads/<?php echo $img; ?>" class="card-img-top rounded-3" alt="Order Item"
                  style="height:200px; object-fit:cover;">
              </div>
            </div>
          <?php } ?>
        </div>

        <!-- Back to Dashboard Button -->
        <div class="d-flex justify-content-end">
          <a href="orders.php" class="btn btn-secondary">Back to Orders</a>

      </div>
    </div>
  </div>
</section>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<?php
admin_configs::footer();
?>
