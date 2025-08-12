<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row">
        
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-dark text-light min-vh-100 p-3">
            <h4 class="mb-4">User Panel</h4>
            <div class="nav flex-column">
                <a class="nav-link text-light" href="#">🏠 Dashboard</a>
                <a class="nav-link text-light" href="#">🛒 My Orders</a>
                <a class="nav-link text-light" href="#">❤️ Wishlist</a>
                <a class="nav-link text-light" href="#">🛍 My Cart</a>
                <a class="nav-link text-light" href="#">⚙ Account Settings</a>
                <a class="nav-link text-danger" href="../auth/logout.php">🚪 Logout</a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            
            <!-- Dashboard Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                <h2>Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "User"; ?> 👋</h2>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4">
                <div class="col-md-3" data-aos="fade-up">
                    <div class="card text-center p-3">
                        <h6>Total Orders</h6>
                        <h3>12</h3>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card text-center p-3">
                        <h6>Wishlist Items</h6>
                        <h3>5</h3>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card text-center p-3">
                        <h6>Cart Items</h6>
                        <h3>3</h3>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card text-center p-3">
                        <h6>Pending Orders</h6>
                        <h3>2</h3>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="mt-5" data-aos="fade-up">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">My Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#2001</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>$120</td>
                                    <td>2025-08-08</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                </tr>
                                <tr>
                                    <td>#2002</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>$80</td>
                                    <td>2025-08-10</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                </tr>
                                <tr>
                                    <td>#2003</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                    <td>$45</td>
                                    <td>2025-08-11</td>
                                    <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

</body>
</html>
