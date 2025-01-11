<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController
{
    public function index()
    {
        require __DIR__ . '/../View/home.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $hashed = password_hash($password, PASSWORD_BCRYPT);

            $userModel = new UserModel();
            $userId = $userModel->createUser($username, $hashed, $role);

            header('Location: index.php?controller=user&action=login');
            exit;
        } else {
            require __DIR__ . '/../View/register.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->findByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header('Location: index.php?controller=project&action=list');
                exit;
            } else {
                $error = "Invalid credentials!";
                require __DIR__ . '/../View/login.php';
            }
        } else {
            require __DIR__ . '/../View/login.php';
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
