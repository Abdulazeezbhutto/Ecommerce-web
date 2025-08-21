<?php
include("includes/admin_configs.php");
include("includes/users.php");

admin_configs::header();
admin_configs::nav_bar();
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-right">
        <h2 class="mb-0 fw-bold text-primary"><i class="bi bi-people me-2"></i>Users Management</h2>
        <a href="dashboard.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <div class="card shadow border-0" data-aos="fade-up">
        <div class="card-header bg-light d-flex flex-wrap justify-content-between align-items-center p-3">
            <h5 class="mb-2 mb-md-0 fw-semibold"><i class="bi bi-list-ul me-2"></i>All Users</h5>
            <!-- Search + Filter + Add -->
            <div class="d-flex flex-wrap gap-2">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Search user...">
                </div>
                <select id="statusFilter" class="form-select form-select-sm" onchange="searchByCategory(this.value)">
                    <option value="">All Status</option>
                    <?php
                    $query = "SELECT  status FROM users";
                    $result = mysqli_query($connection->connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                            <option value="<?php echo $row['status']; ?> "><?php echo ucfirst($row['status']); ?></option>
                            <?php
                        }
                    } else {
                        ?>
                        <option value=""> Status Not Found</option>
                        <?php
                    }
                    ?>
                </select>
                <a href="add_user.php" class="btn btn-success btn-sm shadow-sm">
                    <i class="bi bi-person-plus me-1"></i> Add User
                </a>
            </div>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover table-striped align-middle" id="usersTable">
                <thead class="table-primary text-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Date Joined</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="users">
                    <?php
                    if (mysqli_num_rows($users) > 0) {
                        while ($row = mysqli_fetch_assoc($users)) {
                            ?>
                            <tr>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><span class="badge bg-dark"><?php echo $row['role_type']; ?></span></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <?php if ($row['status'] === "Active") { ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger">Inactive</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($row['status'] === "Active") { ?>
                                        <button onclick="setInactive(<?php echo $row['user_id']; ?>)"
                                            class="btn btn-outline-danger btn-sm py-0 px-1">
                                            <i class="bi bi-x-circle"></i> Inactive
                                        </button>
                                    <?php } else { ?>
                                        <button onclick="setActive(<?php echo $row['user_id']; ?>)"
                                            class="btn btn-outline-success btn-sm py-0 px-1">
                                            <i class="bi bi-check-circle"></i> Active
                                        </button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="7" class="text-center text-muted">No users found</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php admin_configs::footer(); ?>