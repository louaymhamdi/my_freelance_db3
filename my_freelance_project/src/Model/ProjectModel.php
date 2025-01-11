<?php

namespace App\Model;

use App\Config\Database;
use PDO;

class ProjectModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function createProject($recruiter_id, $title, $description, $budget, $deadline)
    {
        $sql = "INSERT INTO projects (recruiter_id, title, description, budget, deadline)
                VALUES (:recruiter_id, :title, :description, :budget, :deadline)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':recruiter_id' => $recruiter_id,
            ':title'        => $title,
            ':description'  => $description,
            ':budget'       => $budget,
            ':deadline'     => $deadline
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getOpenProjects()
    {
        $sql = "SELECT p.*, u.username as recruiter_name
                FROM projects p
                JOIN users u ON p.recruiter_id = u.user_id
                WHERE status = 'open'
                ORDER BY p.created_at DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProjectsByRecruiter($recruiterId)
    {
        $sql = "SELECT * FROM projects
                WHERE recruiter_id = :recruiterId
                ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':recruiterId' => $recruiterId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjectById($projectId)
    {
        $sql = "SELECT * FROM projects
                WHERE project_id = :projectId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':projectId' => $projectId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function markAsHired($project_id, $freelancer_id)
{
    $sql = "UPDATE projects
            SET hired_freelancer_id = :freelancer_id, status = 'closed'
            WHERE project_id = :project_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':freelancer_id' => $freelancer_id,
        ':project_id'    => $project_id
    ]);
}

}
