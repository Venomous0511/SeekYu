<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    public static function findByEmail(string $email): ?array
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function findById(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function create(string $name, string $email, string $password, string $role): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = Database::getConnection()->prepare("
            INSERT INTO users (name, email, password, role) 
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$name, $email, $hash, $role]);
    }

    public static function all(): array
    {
        $stmt = Database::getConnection()->query("SELECT id, name, email, role, created_at FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete(int $id): bool
    {
        $stmt = Database::getConnection()->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
