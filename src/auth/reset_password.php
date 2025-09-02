<?php
require_once "../config/db.php";

if (isset($_GET["token"])) {
    $token = $_GET["token"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if (!$user) die("Invalid or expired token.");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newPass = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $pdo->prepare("UPDATE users SET password = ?, reset_token=NULL, reset_expires=NULL WHERE id = ?")
            ->execute([$newPass, $user["id"]]);

        echo "Password updated! You can now <a href='login.php'>login</a>.";
        exit;
    }
} else {
    die("Token missing.");
}
?>

<form method="POST">
    <h2>Reset Password</h2>
    <input type="password" name="password" placeholder="New Password" required><br>
    <button type="submit">Reset</button>
</form>