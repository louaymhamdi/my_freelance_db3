<?php
namespace App\Model;

use App\Config\Database;
use PDO;

class NotificationModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function addNotification($user_id, $message)
    {
        $sql = "INSERT INTO notifications (user_id, message) VALUES (:user_id, :message)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':message' => $message
        ]);
    }

    public function getUnreadNotifications($user_id)
    {
        $sql = "SELECT * FROM notifications
                WHERE user_id = :user_id AND is_read = FALSE
                ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAsRead($notification_id)
    {
        $sql = "UPDATE notifications SET is_read = TRUE WHERE notification_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $notification_id]);
    }
}
