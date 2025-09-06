<?php

namespace App\Controllers;

use App\Core\Auth;

class DashboardController
{
    public function superadmin()
    {
        $this->authorize('superadmin');
        $this->render('superadmin');
    }

    public function admin()
    {
        $this->authorize('admin');
        $this->render('admin');
    }

    public function hr()
    {
        $this->authorize('hr');
        $this->render('hr');
    }

    public function headGuard()
    {
        $this->authorize('head_guard');
        $this->render('head_guard');
    }

    public function guard()
    {
        $this->authorize('guard');
        $this->render('guard');
    }

    public function client()
    {
        $this->authorize('client');
        $this->render('client');
    }

    public function applicant()
    {
        $this->authorize('applicant');
        $this->render('applicant');
    }

    private function authorize(string $role): void
    {
        if (!Auth::check() || Auth::user()['role'] !== $role) {
            http_response_code(403);
            echo "Forbidden &#45; You don&#39;t have access.";
            exit;
        }
    }

    private function render(string $role): void
    {
        $roleNames = [
            'superadmin' => 'Super Admin',
            'admin' => 'Admin',
            'hr' => 'Human Resources',
            'head_guard' => 'Head Security Guard',
            'guard' => 'Security Guard',
            'client' => 'Client',
            'applicant' => 'Applicant'
        ];

        $viewPath = __DIR__ . "/../Views/dashboards/{$role}.php";

        if (file_exists($viewPath)) {
            $roleName = $roleNames[$role] ?? ucfirst($role);
            $title = "SeekYu - {$roleName} Dashboard";

            require __DIR__ . '/../Includes/head-html.php';
            require $viewPath;
            require __DIR__ . '/../Includes/footer-html.php';
        } else {
            echo "⚠ Dashboard view not found for role: {$role}";
        }
    }
}
