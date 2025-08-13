<?php
include("includes/admin_configs.php");
admin_configs::header();    
?>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 data-aos="fade-right">Orders Management</h2>
            <a href="dashboard.php" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
            </a>
        </div>

        <div class="card shadow-sm" data-aos="fade-up">
            <div class="card-header">
                <h5 class="mb-0">All Orders</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row -->
                        <tr>
                            <td>#1001</td>
                            <td>
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                John Doe
                            </td>
                            <td>2025-08-10</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>$120.50</td>
                            <td><span class="badge bg-primary">Paid</span></td>
                            <td>
                                <a href="view_order.php?id=1001" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="edit_order.php?id=1001" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_order.php?id=1001" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>#1002</td>
                            <td>
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                Sarah Smith
                            </td>
                            <td>2025-08-09</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>$85.00</td>
                            <td><span class="badge bg-secondary">Unpaid</span></td>
                            <td>
                                <a href="view_order.php?id=1002" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="edit_order.php?id=1002" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_order.php?id=1002" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>#1003</td>
                            <td>
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                Alex Brown
                            </td>
                            <td>2025-08-08</td>
                            <td><span class="badge bg-danger">Cancelled</span></td>
                            <td>$45.75</td>
                            <td><span class="badge bg-secondary">Refunded</span></td>
                            <td>
                                <a href="view_order.php?id=1003" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="edit_order.php?id=1003" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_order.php?id=1003" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <!-- End Example Row -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
   <?php admin_configs::footer();   ?>
