<?php
    include("includes/orders.php");
    include("includes/admin_configs.php");

    $order = orders::getorderbyid($_REQUEST['id'], $connection);

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
      <div class="card-header text-white p-4" style="background: linear-gradient(135deg, #281f31ff 0%, #a6c0eeff 100%);" data-aos="fade-right" data-aos-duration="1200">
        <h4 class="mb-0">Order #<?php echo $order['order_id']; ?></h4>
      </div>

      <div class="card-body p-4">
        <div class="row g-4">
          <!-- Left Column -->
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <p class="mb-3"><i class="bi bi-person-circle text-primary"></i> <strong>User ID:</strong> <?php echo $order['user_id']; ?></p>
            
            <p class="mb-3">
              <i class="bi bi-bag-check-fill text-success"></i> 
              <strong>Order Status:</strong> 
              <?php if ($order['order_Status'] == "Completed") { ?>
                <span class="badge bg-success px-3 py-2">Completed</span>
              <?php } elseif ($order['order_Status'] == "Pending") { ?>
                <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
              <?php } else { ?>
                <span class="badge bg-secondary px-3 py-2"><?php echo $order['order_Status']; ?></span>
              <?php } ?>
            </p>

            <p class="mb-3"><i class="bi bi-cash-stack text-info"></i> <strong>Total Amount:</strong> $<?php echo $order['total_ammount']; ?></p>
          </div>

          <!-- Right Column -->
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <p class="mb-3"><i class="bi bi-credit-card-2-front-fill text-danger"></i> <strong>Payment Method:</strong> <?php echo $order['payment_status']; ?></p>
            <p class="mb-3"><i class="bi bi-geo-alt-fill text-primary"></i> <strong>Shipping Address:</strong><br> <?php echo $order['shipping_Address']; ?></p>
          </div>
        </div>

        <hr class="my-4" data-aos="fade-left" data-aos-duration="800">

        <div class="row g-4 text-muted">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <p><i class="bi bi-calendar-event text-secondary"></i> <strong>Placed At:</strong> <?php echo $order['placed_at']; ?></p>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="800">
            <p><i class="bi bi-clock-history text-secondary"></i> <strong>Last Updated:</strong> <?php echo $order['updated_at']; ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Back to Dashboard Button -->
    <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="1000">
      <a href="dashboard.php" class="btn btn-primary btn-lg px-5 shadow-sm rounded-pill">
        <i class="bi bi-arrow-left-circle me-2"></i> Back to Dashboard
      </a>
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
