<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $otp = $_POST["otp"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND otp = ?");
    $stmt->execute([$email, $otp]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $pdo->prepare("UPDATE users SET is_verified = 1, otp = NULL WHERE id = ?")->execute([$user["id"]]);
        echo "Verification successful. You can now login.";
    } else {
        echo "Invalid OTP.";
    }
}
?>

<form method="POST">
    <h2>Verify OTP</h2>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="otp" placeholder="Enter OTP" required><br>
    <button type="submit">Verify</button>
</form>