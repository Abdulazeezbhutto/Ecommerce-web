<?php

include("includes/admin_configs.php");
require("../require/database_connection.php");



class page_configs{



    public static function get_total_sales($connection){
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


    public static function get_total_orders($connection){
        $query = "SELECT COUNT(*) AS total_orders FROM orders;";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_orders'];
        }
        return 0;
    }

    public static function get_total_customers($connection){

        $query = "SELECT COUNT(*) AS total_users FROM users WHERE user_id != 1";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_users'];
        }
        return 0;

    }

    public static function get_total_products($connection){
        $query = "SELECT COUNT(*) AS total_products FROM products";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_products'];
        }
        return 0;
    }

    public static function fetch_orders($connection){
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
                    <div class="col-md-3" data-aos="fade-up">
                        <!--Total sales from DB-->
                        <div class="card text-center p-3">
                            <h6>Total Sales</h6>
                            <h3><?php echo page_configs::get_total_sales($connection); ?></h3>
                        </div>
                        <!--Total sales from DB-->
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <!--Total orders from DB-->
                        
                        <div class="card text-center p-3">
                            <h6>Total Orders</h6>
                            <h3><?php echo page_configs::get_total_orders($connection); ?></h3>
                        </div>
                        <!--Total orders from DB-->
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                        <!--Total customers from DB-->
                        <div class="card text-center p-3">
                            <h6>Customers</h6>
                            <h3><?php echo page_configs::get_total_customers($connection); ?></h3>
                        </div>
                        <!--Total cutomers from DB-->

                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                        <!--Total products from DB-->
                        <div class="card text-center p-3">
                            <h6>Products</h6>
                            <h3><?php echo page_configs::get_total_products($connection); ?></h3>
                        </div>
                        <!--Total orders from DB-->
                    </div>
                </div>

                <!-- Latest Orders Table -->
                <div class="mt-5" data-aos="fade-up">
                    <h4 class="mb-4 fw-bold">Latest Orders</h4>
                    <div class="row g-4">
                        <?php 
                        $result = page_configs::fetch_orders($connection);
                        // var_dump($latest);
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="card shadow-sm border-0 rounded-4">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Order #<?php echo $row['order_id']??""?></h5>
                                                <p class="mb-1"><strong>Customer:</strong><?php echo $row['first_name']." ".$row['last_name']??""?></p>
                                                <p class="mb-1"><strong>Status:</strong>
                                                    <span class="badge bg-success"><?php echo $row['order_status']??""?></span>
                                                </p>
                                                <p class="mb-1"><strong>Total:</strong> $<?php echo $row['total_amount']??""?></p>
                                                <p class="mb-1"><strong>Date:</strong> <?php echo $row['placed_at']??""?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }else{
                            echo "<p>No recent orders found.</p>";
                        }
                        ?>
                        <!-- Order Card -->
                        

                    </div>
                </div>


            </main>
            
        </div>
    </div>



  <?php admin_configs::footer(); ?>