<?php
include("includes/admin_configs.php");
include("includes/users.php");

admin_configs::header();
admin_configs::nav_bar();

class Newsletter {
    public static function get_All_subscribers($connection){
        $query = "SELECT * FROM news_teller ORDER BY news_teller_id DESC";
        $result = mysqli_query($connection->connection, $query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}

$all_subscribers = Newsletter::get_All_subscribers($connection);
?>

<div class="container my-5">
    <!-- Header + Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📧 Newsletter Subscribers</h2>
        <a href="dashboard.php" class="btn btn-primary">⬅️ Back to Dashboard</a>
    </div>

    <!-- Subscribers Table -->
    <div class="card shadow">
        <div class="card-body"> 

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subscribed Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_subscribers ?? [] as $index => $sub): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($sub['email'] ?? 'No Email') ?></td>
                                <td><?= htmlspecialchars($sub['created_at'] ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php admin_configs::footer(); ?>
