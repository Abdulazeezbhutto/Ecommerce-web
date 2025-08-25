<?php

include("includes/admin_configs.php");
require("../require/database_connection.php");



class page_configs
{



    public static function get_total_sales($connection)
    {
        $query = "SELECT IFNULL(SUM(total_ammount), 0) AS total_amount FROM orders";

        // return 10;
        $result = mysqli_query($connection->connection, $query);

        // return 10;


        if ($result) {

            $row = mysqli_fetch_assoc($result);
            return $row['total_amount'] ?? 0; // Return 0 if null
        }
        return 0;

    }


    public static function get_total_orders($connection)
    {
        $query = "SELECT COUNT(*) AS total_orders FROM orders;";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_orders'];
        }
        return 0;
    }

    public static function get_total_customers($connection)
    {

        $query = "SELECT COUNT(*) AS total_users FROM users WHERE user_id != 1";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_users'];
        }
        return 0;

    }

    public static function get_total_products($connection)
    {
        $query = "SELECT COUNT(*) AS total_products FROM products";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_products'];
        }
        return 0;
    }

    public static function fetch_orders($connection)
    {
        // return 10;

        $query = "SELECT orders.*, users.first_name, users.last_name, users.email 
                    FROM orders
                    INNER JOIN users ON users.user_id = orders.user_id
                    ORDER BY orders.placed_at DESC
                    LIMIT 5;";
        // return 10;

        $result = mysqli_query($connection->connection, $query);
        // return 10;

        if ($result) {
            return $result;
        }
        return false;
    }

}


admin_configs::header();


?>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row">


            <!-- Sidebar -->
            <?php
            admin_configs::nav_bar();
            admin_configs::side_bar();
            ?>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4" id="">
                <!-- Dashboard Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                    <h2>Dashboard</h2>
                </div>

                <!-- Stats Cards -->
                <div class="row g-4">
                    <!-- Total Sales -->
                    <div class="col-md-3" data-aos="fade-up">
                        <div
                            class="card bg-gradient bg-success text-white border-0 shadow-lg rounded-4 text-center p-4 h-100">
                            <h6 class="text-uppercase fw-bold">Total Sales</h6>
                            <h3 class="fw-bold"><?php echo page_configs::get_total_sales($connection); ?></h3>
                        </div>
                    </div>

                    <!-- Total Orders -->
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="orders.php" class="text-decoration-none">
                            <div
                                class="card bg-gradient bg-primary text-white border-0 shadow-lg rounded-4 text-center p-4 h-100">
                                <h6 class="text-uppercase fw-bold">Total Orders</h6>
                                <h3 class="fw-bold"><?php echo page_configs::get_total_orders($connection); ?></h3>
                            </div>
                        </a>
                    </div>

                    <!-- Customers -->
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                        <a href="users.php">
                            <div
                            class="card bg-gradient bg-warning text-dark border-0 shadow-lg rounded-4 text-center p-4 h-100">
                            <h6 class="text-uppercase fw-bold">Customers</h6>
                            <h3 class="fw-bold"><?php echo page_configs::get_total_customers($connection); ?></h3>
                        </div>
                        </a>
                    </div>

                    <!-- Products -->
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                        <a href="products.php" class="text-decoration-none">
                            <div
                                class="card bg-gradient bg-danger text-white border-0 shadow-lg rounded-4 text-center p-4 h-100">
                                <h6 class="text-uppercase fw-bold">Products</h6>
                                <h3 class="fw-bold"><?php echo page_configs::get_total_products($connection); ?></h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="mt-5" data-aos="fade-up">
                    <div class="row g-4">
                        <!-- Best Sellers -->
                        <div class="col-md-6">
                            <a href="pdf/fpdf186/best_sellers.php" class="text-decoration-none">
                                <div class="card bg-gradient bg-primary text-white border-0 shadow-lg rounded-4 h-100"
                                    data-aos="zoom-in" data-aos-delay="100">
                                    <div class="card-body text-center p-5">
                                        <h6 class="text-uppercase fw-bold">Download Report</h6>
                                        <h3 class="fw-bold">🚀 Top 10 Best Sellers</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Trending Products -->
                        <div class="col-md-6">
                            <a href="pdf/fpdf186/trending_products.php" class="text-decoration-none">
                                <div class="card bg-gradient bg-dark text-light border-0 shadow-lg rounded-4 h-100"
                                    data-aos="zoom-in" data-aos-delay="200">
                                    <div class="card-body text-center p-5">
                                        <h6 class="text-uppercase fw-bold">Download Report</h6>
                                        <h3 class="fw-bold">🔥 Top 10 Trending Products</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>.
                <!-- Latest Orders Table -->
                <div class="mt-5" data-aos="fade-up">
                    <h4 class="mb-4 fw-bold">Latest Orders</h4>
                    <div class="row g-4">
                        <?php
                        $result = page_configs::fetch_orders($connection);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                                    <a href="view_order.php?id=<?php echo $row['order_id']; ?>" class="text-decoration-none">
                                        <div class="card bg-gradient bg-light shadow-lg border-0 rounded-4 h-100">
                                            <div class="card-body text-center p-4">
                                                <h5 class="card-title fw-bold text-primary">Order
                                                    #<?php echo $row['order_id'] ?? ""; ?></h5>
                                                <p class="mb-1"><strong>Customer:</strong>
                                                    <?php echo ($row['first_name'] ?? "") . " " . ($row['last_name'] ?? ""); ?>
                                                </p>
                                                <p class="mb-1"><strong>Status:</strong>
                                                    <span
                                                        class="badge bg-<?php echo ($row['order_Status'] == 'Completed') ? 'success' : 'warning'; ?>">
                                                        <?php echo $row['order_Status'] ?? ""; ?>
                                                    </span>
                                                </p>
                                                <p class="mb-1"><strong>Total:</strong>
                                                    <span
                                                        class="fw-bold text-success">$<?php echo $row['total_ammount'] ?? ""; ?></span>
                                                </p>
                                                <p class="mb-1"><strong>Date:</strong> <?php echo $row['placed_at'] ?? ""; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p class='text-muted'>No recent orders found.</p>";
                        }
                        ?>
                    </div>
                </div>



            </main>

        </div>
    </div>



    <?php admin_configs::footer(); ?>