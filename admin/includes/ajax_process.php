<?php
require("../../require/database_connection.php");

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Search products
    if ($action == "searchproducts") {
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        
        $query = "SELECT p.*, c.category_name 
                  FROM products p
                  JOIN categories c ON p.category_id = c.category_id
                  WHERE p.product_name LIKE '%" . mysqli_real_escape_string($connection->connection, $name) . "%'";
        
        $result = mysqli_query($connection->connection, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="../uploads/<?php echo htmlspecialchars($row['image_path']); ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                            <p class="text-muted mb-1">
                                Category: <span class="fw-bold"><?php echo htmlspecialchars($row['category_name']); ?></span>
                            </p>
                            <p class="mb-1">Price: <span class="fw-bold">$<?php echo htmlspecialchars($row['price']); ?></span></p>
                            <p class="mb-2">Stock: <?php echo htmlspecialchars($row['stock_quamtitiy']); ?></p>
                            <small class="text-muted">Added on: <?php echo htmlspecialchars($row['create_at']); ?></small>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-sm btn-warning" onclick="editProduct(<?php echo $row['product_id']; ?>)">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteProduct(<?php echo $row['product_id']; ?>)">Delete</button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No products found.</p>";
        }
    }

    // View all products
    elseif ($action == "viewall") {
        $query = "SELECT products.*, categories.category_name 
                  FROM products
                  JOIN categories ON products.category_id = categories.category_id
                  ORDER BY products.create_at DESC";
        
        $result = mysqli_query($connection->connection, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="../uploads/<?php echo htmlspecialchars($row['image_path']); ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                            <p class="text-muted mb-1">Category: <span class="fw-bold"><?php echo htmlspecialchars($row['category_name']); ?></span></p>
                            <p class="mb-1">Price: <span class="fw-bold">$<?php echo htmlspecialchars($row['price']); ?></span></p>
                            <p class="mb-2">Stock: <?php echo htmlspecialchars($row['stock_quamtitiy']); ?></p>
                            <small class="text-muted"><?php echo htmlspecialchars($row['create_at']); ?></small>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-sm btn-warning" onclick="editProduct(<?php echo $row['product_id']; ?>)">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteProduct(<?php echo $row['product_id']; ?>)">Delete</button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No products found.</p>";
        }
    }
}
?>
