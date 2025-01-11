<?php

namespace App\Controller;
use App\Model\ProjectModel;

use App\Model\MessageModel;

class MessageController
{
    public function viewMessages()
    {
        if (!isset($_SESSION['user_id'])) {
            die("Unauthorized");
        }
        if (!isset($_GET['project_id'])) {
            die("No project specified");
        }
        $project_id = (int)$_GET['project_id'];


        $msgModel = new MessageModel();
        $messages = $msgModel->getMessagesByProject($project_id);

        $projectModel = new ProjectModel();
        $project = $projectModel->getProjectById($project_id);

        require __DIR__ . '/../View/view_messages.php';
    }

    
    public function replyForm()
    {
        if (!isset($_SESSION['user_id'])) {
            die("Unauthorized");
        }
        if (!isset($_GET['message_id'])) {
            die("No parent message_id provided.");
        }
        $parent_id = (int) $_GET['message_id'];

        $msgModel = new MessageModel();
        $parentMessage = $msgModel->getMessageById($parent_id);

        if (!$parentMessage) {
            die("Parent message not found");
        }

        require __DIR__ . '/../View/message_reply_form.php';
    }

 
    public function replySubmit()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Invalid request method");
        }
        if (!isset($_SESSION['user_id'])) {
            die("Unauthorized");
        }

        $project_id     = (int) $_POST['project_id'];
        $parent_id      = (int) $_POST['parent_id'];
        $message_content = $_POST['message_content'] ?? '';

        $msgModel = new MessageModel();
        $msgModel->sendMessage($project_id, $_SESSION['user_id'], $parent_id, $message_content);

        header("Location: index.php?controller=message&action=viewMessages&project_id=$project_id");
        exit;
    }

   
    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $project_id      = (int) $_POST['project_id'];
            $message_content = $_POST['message_content'] ?? '';

            $msgModel = new MessageModel();
            $msgModel->sendMessage($project_id, $_SESSION['user_id'], null, $message_content);

            header("Location: index.php?controller=message&action=viewMessages&project_id=$project_id");
            exit;
        } else {
            require __DIR__ . '/../View/message_form.php';
        }
    }
}