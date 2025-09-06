<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $title = "SeekYu - Security Guard Management";

        require __DIR__ . '/../Includes/head-html.php';
        require __DIR__ . '/../Views/home.php';
        require __DIR__ . '/../Includes/footer-html.php';
    }
}
