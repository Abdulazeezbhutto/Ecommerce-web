<?php
include("includes/admin_configs.php");
require("../require/database_connection.php");
admin_configs::header();
admin_configs::nav_bar();
?>

<div class="container-fluid">
    <div class="row">

        <?php admin_configs::side_bar(); ?>
        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">

            <!-- Page Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
                <h2>Products</h2>
                <a href="add_product.php" class="btn btn-primary">➕ Add New Product</a>
            </div>
            <h6 id="msg">Products</h6>

            <!-- Search Section -->
            <div class="container my-4" data-aos="fade-up">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Search Products</h5>

                        <form class="row g-3">
                            <!-- Search by Name -->
                            <div class="col-md-6">
                                <label for="searchName" class="form-label">Search by Name</label>
                                <input type="text" class="form-control" id="searchName"
                                    placeholder="Enter product name">
                            </div>

                            <!-- Search by Category -->
                            <?php
                            $query = "SELECT * FROM categories";
                            $result = mysqli_query($connection->connection, $query);
                            ?>
                            <div class="col-md-6">
                                <label for="searchCategory" class="form-label">Search by Category</label>
                                <select class="form-select" id="searchCategory" onchange="getCategory(this.value)">
                                    <option>--Select--</option>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['category_id'] . "'>" . htmlspecialchars($row['category_name']) . "</option>";
                                        }
                                    } else {
                                        echo "<option>No Category Found..!</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Search Button -->
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div>
                                    <button type="button" class="btn btn-primary" id="search_products"
                                        onclick="searchproducts()">
                                        <i class="bi bi-search me-1"></i> Search
                                    </button>
                                    <button type="reset" class="btn btn-secondary ms-2" id="clear_search"
                                        onclick="clearall()">Clear</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-success" id="view_all"
                                        onclick="viewAllProducts()">
                                        <i class="bi bi-grid me-1"></i> View All Products
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <!-- Products Table -->
            <div class="row g-4" data-aos="fade-up" id="result">

            </div>
    </div>


    </main>
</div>
</div>

<?php admin_configs::footer(); ?>