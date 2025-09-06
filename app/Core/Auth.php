<?php

namespace App\Core;

use App\Models\User;

class Auth
{
    public static function attempt($email, $password): bool
    {
        self::startSession();

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email'],
                'role'  => $user['role']
            ];
            return true;
        }
        return false;
    }

    public static function user(): ?array
    {
        self::startSession();
        return $_SESSION['user'] ?? null;
    }

    public static function check(): bool
    {
        self::startSession();
        return isset($_SESSION['user']);
    }

    public static function logout(): void
    {
        self::startSession();
        $_SESSION = [];
        session_destroy();
        header("Location: " . BASE_URL);
        exit;
    }

    public static function hasRole(string $role): bool
    {
        self::startSession();
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === $role;
    }

    private static function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}
