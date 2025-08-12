<?php

class admin_configs{

    public static function header(){
        ?>
        <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin Dashboard - Ecommerce</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
            </head>

        
        
        
        <?php
    }


    public static function side_bar(){
        ?>
         <nav class="col-md-2 d-none d-md-block bg-dark text-light min-vh-100 p-3">
                <h4 class="mb-4">Admin Panel</h4>
                <div class="nav flex-column">
                    <a class="nav-link text-light" href="dashboard.php">📊 Dashboard</a>
                    <a class="nav-link text-light" href="products.php">🛍 Products</a>
                    <a class="nav-link text-light" href="orders.php">📦 Orders</a>
                    <a class="nav-link text-light" href="users.php">👥 Users</a>
                    <a class="nav-link text-light" href="category.php">📂 Categories</a>
                    <a class="nav-link text-light" href="settings.php">⚙ Settings</a>
                    <a class="nav-link text-danger" href="../auth/logout.php">🚪 Logout</a>
                </div>
            </nav>
        
        
        <?php
    }


    public static function footer(){
        ?>
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
        
        
        
        <?php
    } 

    public static function nav_bar(){
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
        
        
        
        <?php
    }
}















?>