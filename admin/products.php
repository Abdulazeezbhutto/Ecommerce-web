<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Products</title>
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
                <a class="nav-link text-light active" href="products.php">🛍 Products</a>
                <a class="nav-link text-light" href="orders.php">📦 Orders</a>
                <a class="nav-link text-light" href="orders.php">👥 Users</a>
                <a class="nav-link text-light" href="category.php">📂 Categories</a>
                <a class="nav-link text-light" href="#">⚙ Settings</a>
                <a class="nav-link text-danger" href="../auth/logout.php">🚪 Logout</a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">

            <!-- Page Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                <h2>Products</h2>
                <a href="add_product.php" class="btn btn-primary">➕ Add New Product</a>
            </div>

            <!-- Search Section -->
<div class="container my-4" data-aos="fade-up">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">Search Products</h5>
            
            <form class="row g-3">
                <!-- Search by Name -->
                <div class="col-md-6">
                    <label for="searchName" class="form-label">Search by Name</label>
                    <input type="text" class="form-control" id="searchName" placeholder="Enter product name">
                </div>

                <!-- Search by Category -->
                <div class="col-md-6">
                    <label for="searchCategory" class="form-label">Search by Category</label>
                    <select class="form-select" id="searchCategory">
                        <option value="">Select category</option>
                        <option value="mobiles">Mobiles</option>
                        <option value="electronics">Electronics</option>
                        <option value="fashion">Fashion</option>
                        <option value="home">Home Appliances</option>
                    </select>
                </div>

                <!-- Search Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search me-1"></i> Search
                    </button>
                    <button type="reset" class="btn btn-secondary ms-2">Clear</button>
                </div>
            </form>
        </div>
    </div>
</div>


            <!-- Products Table -->
            <div class="row g-4" data-aos="fade-up">
    <!-- Product Card 1 -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="iPhone 15">
            <div class="card-body">
                <h5 class="card-title">iPhone 15</h5>
                <p class="text-muted mb-1">Category: <span class="fw-bold">Mobiles</span></p>
                <p class="mb-1">Price: <span class="fw-bold">$1200</span></p>
                <p class="mb-2">Stock: 15</p>
                <small class="text-muted">Added on: 2025-08-05</small>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="edit_product.php?id=1" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_product.php?id=1" class="btn btn-sm btn-danger">Delete</a>
            </div>
        </div>
    </div>

    <!-- Product Card 2 -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Samsung Galaxy S25">
            <div class="card-body">
                <h5 class="card-title">Samsung Galaxy S25</h5>
                <p class="text-muted mb-1">Category: <span class="fw-bold">Mobiles</span></p>
                <p class="mb-1">Price: <span class="fw-bold">$999</span></p>
                <p class="mb-2">Stock: 8</p>
                <small class="text-muted">Added on: 2025-08-07</small>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="edit_product.php?id=2" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_product.php?id=2" class="btn btn-sm btn-danger">Delete</a>
            </div>
        </div>
    </div>

    <!-- Product Card 3 -->
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="HP Laptop">
            <div class="card-body">
                <h5 class="card-title">HP Laptop</h5>
                <p class="text-muted mb-1">Category: <span class="fw-bold">Electronics</span></p>
                <p class="mb-1">Price: <span class="fw-bold">$750</span></p>
                <p class="mb-2">Stock: 20</p>
                <small class="text-muted">Added on: 2025-08-08</small>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="edit_product.php?id=3" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_product.php?id=3" class="btn btn-sm btn-danger">Delete</a>
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
