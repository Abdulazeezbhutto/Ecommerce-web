<?php
    // include("includes/orders.php");
    include("includes/admin_configs.php");

    // $order = orders::getorderbyid($_REQUEST['id'], $connection);

    admin_configs::header();
?>

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="mb-4 fw-bold text-primary text-center" data-aos="fade-down" data-aos-duration="800">
      ⚙️ Account Settings
    </h2>

    <div class="row g-4">
      <!-- Profile Settings -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card border-0 shadow-lg rounded-4 h-100">
          <div class="card-header text-white p-3" style="background: linear-gradient(135deg, #0f2027, #2c5364);" >
            <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i> Profile Settings</h5>
          </div>
          <div class="card-body">
            <p class="text-muted">Update your personal details such as name, email, and phone number.</p>
            <a href="profile_settings.php" class="btn btn-outline-primary rounded-pill">
              <i class="bi bi-pencil-square me-2"></i> Edit Profile
            </a>
          </div>
        </div>
      </div>

      <!-- Password Settings -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="card border-0 shadow-lg rounded-4 h-100">
          <div class="card-header text-white p-3" style="background: linear-gradient(135deg, #42275a, #734b6d);" >
            <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i> Security</h5>
          </div>
          <div class="card-body">
            <p class="text-muted">Change your password regularly to keep your account secure.</p>
            <a href="change_password.php" class="btn btn-outline-danger rounded-pill">
              <i class="bi bi-key-fill me-2"></i> Change Password
            </a>
          </div>
        </div>
      </div>

      <!-- Notification Settings -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="600">
        <div class="card border-0 shadow-lg rounded-4 h-100">
          <div class="card-header text-white p-3" style="background: linear-gradient(135deg, #005c97, #363795);" >
            <h5 class="mb-0"><i class="bi bi-bell-fill me-2"></i> Notifications</h5>
          </div>
          <div class="card-body">
            <p class="text-muted">Manage email and SMS notifications for your account.</p>
            <a href="notification_settings.php" class="btn btn-outline-info rounded-pill">
              <i class="bi bi-bell me-2"></i> Manage Notifications
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Back to Dashboard -->
    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="800">
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
