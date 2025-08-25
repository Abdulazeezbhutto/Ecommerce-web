<?php
include("require/products.php");
// require("require/database_connection.php");
session_start();

// global $connection;
class WebConfig
{
    public static function header()
    {
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>E-commerce Website</title>

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


            <script>
                function addToCart(productId, userId, price, imagePath, productName, quantity) {

                    var action = "cart_process";

                    var ajax_request = null;
                    if (window.XMLHttpRequest) {
                        // For modern browsers
                        ajax_request = new XMLHttpRequest();
                    } else {
                        // For older IE versions
                        ajax_request = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    ajax_request.onreadystatechange = function () {
                        if (ajax_request.readyState === 4) {
                            if (ajax_request.status === 200) {
                                // Response ko result div me show karo
                                document.getElementById("result").innerHTML = ajax_request.responseText;
                            } else {
                                document.getElementById("result").innerHTML = "Error adding product to cart.";
                            }
                        }
                    };

                    ajax_request.open("POST", "includes/ajax_process.php", true);
                    ajax_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    ajax_request.send(
                        "product_id=" + encodeURIComponent(productId) +
                        "&action=" + encodeURIComponent(action) +
                        "&user_id=" + encodeURIComponent(userId) +
                        "&price=" + encodeURIComponent(price) +
                        "&image_path=" + encodeURIComponent(imagePath) +
                        "&product_name=" + encodeURIComponent(productName) +
                        "&quantity=" + encodeURIComponent(quantity)
                    );
                }
            </script>



            <style>
                /* Reduce carousel height */
                .small-carousel img {
                    height: 350px;
                    object-fit: cover;
                }
            </style>
        </head>

        <body>

            <?php
    }
    public static function navbar()
    {

        ?>
            <nav class="navbar navbar-expand-lg bg-light shadow-sm sticky-top py-3">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold text-primary fs-3" href="index.php"> <img
                            src="assets/web_logo-removebg-preview.png" alt="" class="img-fluid" style="height: 50px;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left Menu -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>

                            <!-- Categories Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                    <?php
                                    global $categories;
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            ?>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="category.php?cat_id=<?php echo htmlspecialchars($category['category_id']); ?>&name=<?php echo htmlspecialchars($category['category_name']); ?>">
                                                    <?php echo htmlspecialchars($category['category_name']); ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <li><span class="dropdown-item-text">No categories found</span></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        </ul>

                        <!-- Search Bar -->
                        <form class="d-flex me-3" role="search" method="GET" action="shop.php">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search products..."
                                aria-label="Search" />
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>

                        <!-- Account Section -->
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="auth/logout.php" class="btn btn-primary me-2">Logout</a>
                            <a href="<?php echo ($_SESSION['user']['role_id'] == 1) ? 'admin/' : 'user/'; ?>dashboard.php"
                                class="btn btn-primary">
                                View Profile
                            </a>
                        <?php else: ?>
                            <a href="auth/login.php" class="btn btn-primary">Account</a>
                        <?php endif; ?>

                    </div>
                </div>
            </nav>

            <?php
    }


    public static function footer()
    {
        ?>

            <!-- Footer -->
            <footer class="bg-dark text-light pt-5 pb-4 mt-2">
                <div class="container text-md-left">
                    <div class="row text-md-left">

                        <!-- About Section -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h5 class="text-uppercase fw-bold mb-4 text-primary">MyShop</h5>
                            <p>
                                MyShop is your one-stop destination for the latest trends, high-quality products, and
                                unbeatable deals.
                            </p>
                        </div>

                        <!-- Categories Section (Dynamic from DB) -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase fw-bold mb-4">Products</h6>

                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle w-100" type="button" id="categoriesDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Category
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="categoriesDropdown">
                                    <?php
                                    global $categories;
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            ?>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="category.php?cat_id=<?php echo htmlspecialchars($category['category_id']); ?>">
                                                    <?php echo htmlspecialchars($category['category_name']); ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <li><span class="dropdown-item-text text-muted">No categories found</span></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>


                        <!-- Useful Links -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase fw-bold mb-4">Useful Links</h6>
                            <p><a href="auth/login.php" class="text-light text-decoration-none">Your Account</a></p>
                            <p><a href="<?php isset($_SESSION['user']) ? "user/dashboard.php" : "auth/login.php " ?>"
                                    class="text-light text-decoration-none">Orders</a></p>
                            <p><a href="#" class="text-light text-decoration-none">Help</a></p>
                            <p><a href="#" class="text-light text-decoration-none">Privacy Policy</a></p>
                        </div>

                        <!-- Contact Section -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="bi bi-house-door me-2"></i> Karachi, Pakistan</p>
                            <p><i class="bi bi-envelope me-2"></i> support@yourshop.com</p>
                            <p><i class="bi bi-phone me-2"></i> +92 300 1234567</p>
                        </div>
                    </div>

                    <hr class="my-3">

                    <!-- Copyright -->
                    <div class="row">
                        <div class="col-md-7 col-lg-8">
                            <p class="mb-0">© 2025 YourShop. All rights reserved.</p>
                        </div>
                        <div class="col-md-5 col-lg-4 text-md-end">
                            <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-light me-3"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </footer>



            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

            <script>
                const videoModal = document.getElementById('videoModal');
                const videoFrame = document.getElementById('videoFrame');

                videoModal.addEventListener('show.bs.modal', event => {
                    videoFrame.src = "https://www.youtube.com/embed/pjtsGzQjFM4?autoplay=1";
                });

                videoModal.addEventListener('hidden.bs.modal', event => {
                    videoFrame.src = "";
                });
            </script>

            <!-- AOS CSS & JS (Add in <head> and before </body>) -->
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
}


?>