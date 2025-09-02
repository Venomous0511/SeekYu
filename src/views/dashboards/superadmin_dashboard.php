<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "../../../includes/auth.php";

require_login();
checkRole(['superadmin']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #1f2937;
            color: #fff;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            margin: 8px 0;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #374151;
            color: #fff;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .logout {
            display: block;
            margin-top: 40px;
            padding: 10px;
            background: #ef4444;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
        }

        .logout:hover {
            background: #dc2626;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Super Admin</h2>
        <a href="#">Dashboard</a>
        <a href="#">Manage Users</a>
        <a href="#">Clients</a>
        <a href="#">Guards</a>
        <a href="#">Deployments</a>
        <a href="#">Reports</a>
        <a href="../../auth/logout.php" class="logout">Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h1>
        <p>You are logged in as <b>Super Admin</b>.</p>

        <div class="card">
            <h2>Quick Stats</h2>
            <ul>
                <li>Total Users: 120</li>
                <li>Active Guards: 85</li>
                <li>Pending Applicants: 12</li>
                <li>Clients: 8</li>
            </ul>
        </div>

        <div class="card">
            <h2>Recent Activity</h2>
            <p>No recent activity yet.</p>
        </div>
    </div>

</body>

</html>