<?php
require_once "../../config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company = trim($_POST["company"]);
    $contact = trim($_POST["contact"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $otp = rand(100000, 999999);
    $status = "pending";

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, status, otp) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$company, $email, $password, "client", $status, $otp])) {
        $message = "Client registered! OTP: $otp (for testing)";
    } else {
        $message = "Error registering client.";
    }
}
?>
<?php include '../includes/header.php'; ?>

<h2>Client Registration</h2>

<?php if ($message) echo "<p>$message</p>"; ?>

<form method="POST">
    <input type="text" name="company" placeholder="Company Name" required><br>
    <input type="text" name="contact" placeholder="Contact Person" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>

<?php include '../includes/footer.php'; ?>