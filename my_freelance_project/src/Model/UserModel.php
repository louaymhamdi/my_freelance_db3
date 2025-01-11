<?php

namespace App\Model;

use App\Config\Database;
use PDO;

class UserModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function createUser($username, $hashedPassword, $role)
    {
        $sql = "INSERT INTO users (username, password, role) 
                VALUES (:username, :password, :role)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword,
            ':role'     => $role
        ]);
        return $this->pdo->lastInsertId();
    }

    public function findByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
