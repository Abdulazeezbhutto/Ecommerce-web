<?php
include("includes/admin_configs.php");

admin_configs::header();
admin_configs::nav_bar();
?>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-right">
            <h2 class="mb-0">Users Management</h2>
            <a href="dashboard.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="card shadow-sm" data-aos="fade-up">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">All Users</h5>
                <a href="add_user.html" class="btn btn-primary btn-sm">
                    <i class="bi bi-person-plus me-1"></i> Add New User
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date Joined</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row -->
                        <tr>
                            <td>1</td>
                            <td>
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                John Doe
                            </td>
                            <td>johndoe@example.com</td>
                            <td>Admin</td>
                            <td>2025-07-15</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <a href="view_user.html?id=1" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="edit_user.html?id=1" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_user.html?id=1" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                Sarah Smith
                            </td>
                            <td>sarahsmith@example.com</td>
                            <td>Customer</td>
                            <td>2025-06-10</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>
                                <a href="view_user.html?id=2" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="edit_user.html?id=2" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_user.html?id=2" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                Alex Brown
                            </td>
                            <td>alexbrown@example.com</td>
                            <td>Seller</td>
                            <td>2025-05-20</td>
                            <td><span class="badge bg-danger">Banned</span></td>
                            <td>
                                <a href="view_user.html?id=3" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="edit_user.html?id=3" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_user.html?id=3" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <!-- End Example Row -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
 <?php admin_configs::footer(); ?>
