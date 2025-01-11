<?php

namespace App\Model;

use App\Config\Database;
use PDO;

class MessageModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function sendMessage($project_id, $sender_id, $parent_id, $message_content)
    {
        $sql = "INSERT INTO messages (project_id, sender_id, parent_id, message_content)
                VALUES (:project_id, :sender_id, :parent_id, :message_content)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':project_id'      => $project_id,
            ':sender_id'       => $sender_id,
            ':parent_id'       => $parent_id,     
            ':message_content' => $message_content
        ]);
        return $this->pdo->lastInsertId();
    }

    
    public function getMessageById($message_id)
    {
        $sql = "SELECT * FROM messages WHERE message_id = :message_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':message_id' => $message_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function getMessagesByProject($project_id)
    {
        $sql = "SELECT m.*, u.username AS sender_name
                FROM messages m
                JOIN users u ON m.sender_id = u.user_id
                WHERE m.project_id = :project_id
                ORDER BY m.sent_at ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':project_id' => $project_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
