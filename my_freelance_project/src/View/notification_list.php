<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Notifications</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require __DIR__ . '/partials/navbar.php'; ?>

    <h1>My Unread Notifications</h1>

    <p>
        <a href="index.php?controller=notification&action=markAllRead">
            Mark All as Read
        </a>
    </p>

    <?php if (!empty($unreads)): ?>
        <ul>
            <?php foreach ($unreads as $notif): ?>
                <li>
                    <?= htmlspecialchars($notif['message']) ?>
                    <em>(<?= htmlspecialchars($notif['created_at']) ?>)</em>
                    
                    <a href="index.php?controller=notification&action=markRead&notification_id=<?= $notif['notification_id'] ?>">
                        Mark Read
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>You have no unread notifications.</p>
    <?php endif; ?>

    <p><a href="index.php">Back to Home</a></p>
</body>
</html>
