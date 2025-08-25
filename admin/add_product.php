<?php
include("includes/admin_configs.php");
require("../require/database_connection.php");


admin_configs::header();

?>
<!-- Navbar -->
<?php admin_configs::nav_bar(); ?>

<!-- Main Container -->
<div class="container py-4" data-aos="fade-up">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Add New Product</h2>
        <a href="products.php" class="btn btn-secondary">Back to Products</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="includes/products.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" required>
                </div>


                <?php

                $query = "SELECT * FROM categories";
                $result = mysqli_query($connection->connection, $query);
                ?>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option>--Select Category--</option>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['category_id'] . "'>" . htmlspecialchars($row['category_name']) . "</option>";
                            }
                        } else {
                            echo "<option>No Category Found</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" name="stock_quantity" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="product_image" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary" name="submit" value="add_product">Add Product</button>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<?php admin_configs::footer(); ?>