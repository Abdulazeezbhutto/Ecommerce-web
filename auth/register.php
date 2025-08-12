<?php
require("../require/database_connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Signup - Ecommerce</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <section class="vh-100 bg-light d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card shadow-sm rounded-4">
            <div class="card-body p-4">
              <h3 class="mb-4 text-center fw-bold">Create Your Account</h3>
              <h6 class="mb-4 text-center fw-bold"><?php echo $_GET['msg']??""?></h6>

              <form method="POST" action="process.php">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control form-control-lg" id="firstName" name="first_name" placeholder="John" required />
                  </div>
                  <div class="col-md-4">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control form-control-lg" id="middleName" name="middle_name" placeholder="Michael" />
                  </div>
                  <div class="col-md-4">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control form-control-lg" id="lastName" name="last_name" placeholder="Doe" required />
                  </div>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="you@example.com" required />
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" required />
                  </div>
                  <div class="col-md-6">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control form-control-lg" id="confirmPassword" name="confirm_password" placeholder="Confirm password" required />
                  </div>
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="+1 234 567 8901" required />
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control form-control-lg" id="address" name="address" placeholder="1234 Main St" required />
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control form-control-lg" id="city" name="city" placeholder="New York" required />
                  </div>
                  <div class="col-md-6">
                    <label for="state" class="form-label">State / Province</label>
                    <input type="text" class="form-control form-control-lg" id="state" name="state" placeholder="NY" required />
                  </div>
                </div>

                <div class="row g-3 mb-4">
                  <div class="col-md-6">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select form-select-lg" id="country" name="country" required>
                      <option value="" selected disabled>Choose...</option>
                      <?php
                      $query = "SELECT * FROM country";
                      $result = mysqli_query($connection->connection, $query);

                      if ($result && mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="' . htmlspecialchars($row['country_id']) . '">' . htmlspecialchars($row['country_name']) . '</option>';
                          }
                      } else {
                          echo '<option disabled>No countries available</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="text" class="form-control form-control-lg" id="postalCode" name="postal_code" placeholder="10001" required />
                  </div>
                </div>

                <div class="d-grid mb-3">
                  <button type="submit" class="btn btn-primary btn-lg fw-semibold" name = "submit" value = "register">Sign Up</button>
                </div>
                <p class="text-center mb-0">
                  Already have an account?
                  <a href="login.php" class="text-primary fw-semibold text-decoration-none">Log in</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
