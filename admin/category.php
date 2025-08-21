<?php
include("includes/admin_configs.php");
require("../require/database_connection.php");
admin_configs::header();
admin_configs::nav_bar();
?>

<!-- Main Container -->
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-down">
        <h2 class="fw-bold">Manage Categories</h2>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <div class="row">
        <!-- Category List -->
        <div class="col-lg-8 mb-4" data-aos="fade-right">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="mb-3" id="msg"></h6>
                    <h5 class="mb-3">Category List</h5>
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
                        $query = "SELECT * from categories";
                        $result = mysqli_query($connection->connection, $query);
                        ?>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr id="category-<?php echo $row['category_id']; ?>">
                                        <td><?php echo $row['category_id']; ?></td>
                                        <td><?php echo $row['category_name']; ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm"
                                                onclick="editCategory(<?php echo $row['category_id']; ?>)"
                                                data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                Edit
                                            </button>

                                            <button class="btn btn-danger btn-sm"
                                                onclick="deleteCategory(<?php echo $row['category_id']; ?>)">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3" class="text-center">No categories found.</td>
                                </tr>
                                <?php
                            }

                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


        <!-- Edit Modal -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="includes/products.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" id="edit_category_id" name="category_id">

                            <div class="mb-3">
                                <label for="edit_category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="edit_category_name" name="category_name">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="update_category(
                                            document.getElementById('edit_category_id').value,
                                            document.getElementById('edit_category_name').value
                                        )">
                                Save Changes
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>





        <!-- Add Category Form -->
        <div class="col-lg-4" data-aos="fade-left">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3">Add New Category</h5>
                    <form method="POST" action="includes/products.php">
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter category name"
                                name="category_name" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="submit" value="add_category">Add
                            Category</button>
                    </form>
                    <h6 class="mt-6"><?php echo $_GET['msg'] ?? ""; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<?php admin_configs::footer(); ?>