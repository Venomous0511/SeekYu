<?php
require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/../app/Core/Router.php';

use App\Core\Router;

$router = new Router();

// ===== Routes =====

// Public pages
$router->get('/', 'HomeController@index');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@doLogin');
$router->get('/logout', 'AuthController@logout');

// Dashboards (Role-based)
$router->get('/dashboard/superadmin', 'DashboardController@superadmin');
$router->get('/dashboard/admin', 'DashboardController@admin');
$router->get('/dashboard/hr', 'DashboardController@hr');
$router->get('/dashboard/head-guard', 'DashboardController@headGuard');
$router->get('/dashboard/guard', 'DashboardController@guard');
$router->get('/dashboard/client', 'DashboardController@client');
$router->get('/dashboard/applicant', 'DashboardController@applicant');

// Dispatch request (match URL + HTTP method)
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
