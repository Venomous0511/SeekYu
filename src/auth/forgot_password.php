<?php
require_once "../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(16));
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $pdo->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE id = ?")
            ->execute([$token, $expires, $user["id"]]);

        $resetLink = "http://localhost/auth/reset_password.php?token=$token";
        mail($email, "Password Reset", "Click here to reset your password: $resetLink");
        echo "Check your email for reset link.";
    } else {
        echo "Email not found.";
    }
}
?>

<form method="POST">
    <h2>Forgot Password</h2>
    <input type="email" name="email" placeholder="Enter your email" required><br>
    <button type="submit">Send Reset Link</button>
</form>