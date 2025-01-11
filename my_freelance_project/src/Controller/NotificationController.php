<?php
namespace App\Controller;

use App\Model\ProjectModel;
use App\Model\NotificationModel;

class ProjectController
{
    private $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function list()
    {
        
        $projects = $this->projectModel->getOpenProjects();
        require __DIR__ . '/../View/project_list.php';
    }

    public function create()
    {
        if ($_SESSION['role'] !== 'recruiter') {
            die("Unauthorized");
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title       = $_POST['title'];
            $description = $_POST['description'];
            $budget      = $_POST['budget'];
            $deadline    = $_POST['deadline'];

            $this->projectModel->createProject($_SESSION['user_id'], $title, $description, $budget, $deadline);

            header('Location: index.php?controller=project&action=list');
            exit;
        } else {
            require __DIR__ . '/../View/project_create.php';
        }
    }

    public function myProjects()
    {
        // Ensure user is logged in and is a recruiter
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'recruiter') {
            die("Unauthorized access");
        }

        $projects = $this->projectModel->getProjectsByRecruiter($_SESSION['user_id']);
        require __DIR__ . '/../View/my_projects.php';
    }

    public function hireFreelancer()
    {
        if ($_SESSION['role'] !== 'recruiter') {
            die("Unauthorized");
        }

        $project_id    = (int) $_GET['project_id'];
        $freelancer_id = (int) $_GET['freelancer_id'];

        $project = $this->projectModel->getProjectById($project_id);
        if (!$project || $project['recruiter_id'] != $_SESSION['user_id']) {
            die("Invalid project or not yours.");
        }

        $this->projectModel->markAsHired($project_id, $freelancer_id);

        $notificationModel = new NotificationModel();
        $notificationModel->addNotification(
            $freelancer_id,
            "Congrats! You have been hired for Project #{$project_id}"
        );

        header("Location: index.php?controller=message&action=viewMessages&project_id=$project_id");
        exit;
    }
}
