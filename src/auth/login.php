<?php
session_start();
require_once "../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        if ($user["is_verified"] == 0) {
            $error = "Please verify your email before login.";
        } else {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_role"] = $user["role"];
            $_SESSION['user_name'] = $user['name'] ?? $user['email'];

            switch ($user["role"]) {
                case "superadmin":
                    header("Location: ../views/dashboards/superadmin_dashboard.php");
                    exit;
                case "admin":
                    header("Location: ../views/dashboards/admin_dashboard.php");
                    exit;
                case "hr":
                    header("Location: ../views/dashboards/hr_dashboard.php");
                    exit;
                case "head_guard":
                    header("Location: ../views/dashboards/headguard_dashboard.php");
                    exit;
                case "guard":
                    header("Location: ../views/dashboards/guard_dashboard.php");
                    exit;
                case "client":
                    header("Location: ../views/dashboards/client_dashboard.php");
                    exit;
                case "applicant":
                    header("Location: ../views/dashboards/applicant_dashboard.php");
                    exit;
            }
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<?php include '../includes/header.php'; ?>

<!-- Login -->
<section id="login" class="section min-h-screen flex items-center justify-center px-6">
    <div class="max-w-md w-full bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-center text-white">Login</h2>

        <?php if (!empty($error)) echo "<p class='text-center text-rose-500 pt-5'>$error</p>"; ?>

        <form method="POST" class="space-y-4 mt-6">
            <!-- Dropdown for role -->
            <!-- 
                <select name="role" class="w-full rounded-md p-2 bg-gray-700 text-white" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="guard">Security Guard / Client</option>
                    <option value="applicant">Applicant</option>
                </select> 
            -->

            <!-- Common inputs -->
            <input type="email" name="email" placeholder="Enter your Email" required class="w-full rounded-md p-2 bg-gray-700 text-white">
            <input type="password" name="password" placeholder="Password" required class="w-full rounded-md p-2 bg-gray-700 text-white">

            <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-2 rounded-md">Log in</button>
        </form>

        <p class="mt-5"><a href="forgot_password.php" class="text-white">Forgot Password?</a></p>

    </div>
</section>

<?php include '../includes/footer.php'; ?>