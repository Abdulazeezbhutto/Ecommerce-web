<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-dark text-light min-vh-100 p-3">
                <h4 class="mb-4">Admin Panel</h4>
                <div class="nav flex-column">
                    <a class="nav-link text-light" href="dashboard.php">📊 Dashboard</a>
                    <a class="nav-link text-light" href="products.php">🛍 Products</a>
                    <a class="nav-link text-light" href="orders.php">📦 Orders</a>
                    <a class="nav-link text-light" href="users.php">👥 Users</a>
                    <a class="nav-link text-light" href="category.php">📂 Categories</a>
                    <a class="nav-link text-light" href="#">⚙ Settings</a>
                    <a class="nav-link text-danger" href="../auth/logout.php">🚪 Logout</a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">

                <!-- Dashboard Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                    <h2>Dashboard</h2>
                </div>

                <!-- Stats Cards -->
                <div class="row g-4">
                    <div class="col-md-3" data-aos="fade-up">
                        <div class="card text-center p-3">
                            <h6>Total Sales</h6>
                            <h3>$15,230</h3>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card text-center p-3">
                            <h6>Total Orders</h6>
                            <h3>325</h3>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="card text-center p-3">
                            <h6>Customers</h6>
                            <h3>1,245</h3>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="card text-center p-3">
                            <h6>Products</h6>
                            <h3>542</h3>
                        </div>
                    </div>
                </div>

                <!-- Latest Orders Table -->
                <div class="mt-5" data-aos="fade-up">
                    <h4 class="mb-4 fw-bold">Latest Orders</h4>
                    <div class="row g-4">

                        <!-- Order Card -->
                        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Order #1001</h5>
                                    <p class="mb-1"><strong>Customer:</strong> John Doe</p>
                                    <p class="mb-1"><strong>Status:</strong>
                                        <span class="badge bg-success">Completed</span>
                                    </p>
                                    <p class="mb-1"><strong>Total:</strong> $250</p>
                                    <p class="mb-1"><strong>Date:</strong> 2025-08-10</p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Card -->
                        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Order #1002</h5>
                                    <p class="mb-1"><strong>Customer:</strong> Jane Smith</p>
                                    <p class="mb-1"><strong>Status:</strong>
                                        <span class="badge bg-warning">Pending</span>
                                    </p>
                                    <p class="mb-1"><strong>Total:</strong> $150</p>
                                    <p class="mb-1"><strong>Date:</strong> 2025-08-11</p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Card -->
                        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Order #1003</h5>
                                    <p class="mb-1"><strong>Customer:</strong> Mike Johnson</p>
                                    <p class="mb-1"><strong>Status:</strong>
                                        <span class="badge bg-danger">Cancelled</span>
                                    </p>
                                    <p class="mb-1"><strong>Total:</strong> $80</p>
                                    <p class="mb-1"><strong>Date:</strong> 2025-08-11</p>
                                </div>
                            </div>
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