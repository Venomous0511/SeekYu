<?php
require_once "../../config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $role = "applicant";
    $otp = rand(100000, 999999);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, otp) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $password, $role, $otp])) {
        // Send OTP via email
        mail($email, "Verify your account", "Your OTP is: $otp");

        $message = "Registered successfully! Please check your email for the OTP to verify your account.";
        exit;
    } else {
        $message = "Error registering user.";
    }
}
?>

<?php include '../includes/header.php'; ?>

<h2>Applicant Registration</h2>

<?php if ($message) echo "<p>$message</p>"; ?>

<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>

<?php include '../includes/footer.php'; ?>