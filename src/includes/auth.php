<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '../../../config/db.php';

// Check if user is logged in
function require_login()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: /auth/login.php");
        exit();
    }
}

// Check user role
function checkRole($roles = [])
{
    if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], $roles)) {
        header("Location: /auth/login.php");
        exit();
    }
}
