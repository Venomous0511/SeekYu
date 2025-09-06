<?php

namespace App\Controllers;

use App\Core\Auth;

class AuthController
{
    public function login()
    {
        $title = "SeekYu - Login";

        require __DIR__ . '/../Includes/head-html.php';
        require __DIR__ . '/../Views/login.php';
        require __DIR__ . '/../Includes/footer-html.php';
    }

    public function doLogin()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (Auth::attempt($email, $password)) {
            $role = Auth::user()['role'];

            switch ($role) {
                case 'superadmin':
                    header("Location: " . BASE_URL . "/dashboard/superadmin");
                    break;
                case 'admin':
                    header("Location: " . BASE_URL . "/dashboard/admin");
                    break;
                case 'hr':
                    header("Location: " . BASE_URL . "/dashboard/hr");
                    break;
                case 'head_guard':
                    header("Location: " . BASE_URL . "/dashboard/head-guard");
                    break;
                case 'guard':
                    header("Location: " . BASE_URL . "/dashboard/guard");
                    break;
                case 'client':
                    header("Location: " . BASE_URL . "/dashboard/client");
                    break;
                case 'applicant':
                    header("Location: " . BASE_URL . "/dashboard/applicant");
                    break;
            }
            exit;
        } else {
            $error = "Wrong email or password.";
            require __DIR__ . '/../Includes/head-html.php';
            require __DIR__ . '/../Views/login.php';
            require __DIR__ . '/../Includes/footer-html.php';
        }
    }

    public function logout()
    {
        Auth::logout();
        exit;
    }
}
