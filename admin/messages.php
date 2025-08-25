<?php
include("includes/admin_configs.php");
include("includes/users.php");

admin_configs::header();
admin_configs::nav_bar();

class Messages {
    public static function get_All_messages($connection){
        $query = "SELECT * FROM messages ORDER BY message_id DESC";
        $result = mysqli_query($connection->connection, $query);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}

$all_messages = Messages::get_All_messages($connection);
?>

<div class="container my-5">
    <!-- Header + Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📩 Messages</h2>
        <a href="dashboard.php" class="btn btn-primary">⬅️ Back to Dashboard</a>
    </div>

    <!-- Messages List -->
    <div class="card shadow">
        <div class="card-body">

            <?php foreach ($all_messages ?? [] as $msg): ?>
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-1">
                            <?= htmlspecialchars($msg['full_name'] ?? 'Unknown') ?>
                            <span class="badge 
                                <?= ($msg['status'] ?? 'New') === 'Unread' ? 'bg-warning' : 
                                    (($msg['status'] ?? 'New') === 'Resolved' ? 'bg-success' : 
                                    (($msg['status'] ?? 'New') === 'Read' ? 'bg-secondary' : 'bg-danger')) ?>">
                                <?= htmlspecialchars($msg['status'] ?? 'New') ?>
                            </span>
                        </h5>
                        <h6 class="card-subtitle text-muted mb-2"><?= htmlspecialchars($msg['email'] ?? 'No email') ?></h6>
                        <p><strong>Subject:</strong> <?= htmlspecialchars($msg['subject'] ?? 'No subject') ?></p>
                        <p class="card-text"><?= nl2br(htmlspecialchars($msg['message'] ?? 'No message')) ?></p>
                        <small class="text-muted"><?= htmlspecialchars($msg['created_at'] ?? '') ?></small>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<?php admin_configs::footer(); ?>
