<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\UserController;
use App\Controller\ProjectController;
use App\Controller\MessageController;
use App\Controller\NotificationController;

session_start();

$controllerName = $_GET['controller'] ?? 'user';
$actionName = $_GET['action'] ?? 'index';

// c'est de la merde mais ca marche 
switch ($controllerName) {
    case 'user':
        $controller = new UserController();
        break;
    case 'project':
        $controller = new ProjectController();
        break;
    case 'message':
        $controller = new MessageController();
        break;
        case 'notification':
            $controller = new NotificationController();
            break;
    default:
        $controller = new UserController();
        break;
        
}

if (method_exists($controller, $actionName)) {
    $controller->$actionName();
} else {
    // 404 
    echo "Action not found!";
}
