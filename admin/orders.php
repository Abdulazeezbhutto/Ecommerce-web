<?php
include("includes/admin_configs.php");
include("../require/database_connection.php");
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
        <?php
        $query = "SELECT 
                        o.order_id,
                        CONCAT(u.first_name, ' ', u.last_name) AS customer_name,
                        o.placed_at,
                        o.order_status,
                        o.total_ammount,
                        o.payment_status
                    FROM orders o
                    INNER JOIN users u ON o.user_id = u.user_id
                    ORDER BY o.placed_at DESC;
                    ";

        $result = mysqli_query($connection->connection, $query);
        if (mysqli_num_rows($result) > 0) {
            ?>
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
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['order_id']; ?></td>
                                <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                                <td><?php echo date("Y-m-d", strtotime($row['placed_at'])); ?></td>
                                <td>
                                    <span
                                        class="badge <?php echo $row['order_status'] == 'Completed' ? 'bg-success' : ($row['order_status'] == 'Pending' ? 'bg-warning' : 'bg-danger'); ?>">
                                        <?php echo htmlspecialchars($row['order_status']); ?>
                                    </span>
                                </td>
                                <td>$<?php echo number_format($row['total_ammount'], 2); ?></td>
                                <td>
                                    <span
                                        class="badge <?php echo $row['payment_status'] == 'Paid' ? 'bg-primary' : 'bg-secondary'; ?>">
                                        <?php echo htmlspecialchars($row['payment_status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="view_order.php?id=<?php echo $row['order_id']; ?>"
                                        class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <?php

                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php

        } else {
            ?>
    <div class="alert alert-warning" role="alert">
        No orders found.
    </div>
    <?php
        }

        ?>

<!-- Bootstrap JS -->
<?php admin_configs::footer(); ?>