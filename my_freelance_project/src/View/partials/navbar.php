<!-- src/View/partials/navbar.php -->

<?php
use App\Model\NotificationModel;

$unreadCount = 0;

if (isset($_SESSION['user_id'])) {
    $notifModel = new NotificationModel();
    $unreads = $notifModel->getUnreadNotifications($_SESSION['user_id']);
    $unreadCount = count($unreads);
}
?>

<nav >
    <a href="index.php">Home</a>

    <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="index.php?controller=user&action=login">Login</a>
        <a href="index.php?controller=user&action=register">Register</a>
    <?php else: ?>
        <a href="index.php?controller=project&action=list"> Projets</a>
        <a href="index.php?controller=project&action=myProjects">Mes Projets</a>
        
        <a href="index.php?controller=notification&action=list">
            Notifications (<?= $unreadCount ?>)
        </a>

        <a href="index.php?controller=user&action=logout">Logout</a>
    <?php endif; ?>
</nav>
<hr>
