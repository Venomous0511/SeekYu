<?php
$password = "Password#123"; // Plain text password from user input

// Hash using bcrypt (default)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

echo "Plain: $password<br>";
echo "Hashed: $hashedPassword";
?>

<section id="login" class="section min-h-screen flex items-center justify-center px-6">
    <div class="max-w-md w-full bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-center text-white">Login</h2>

        <form action="<?= BASE_URL ?>/login" method="POST" class="space-y-4 mt-6">
            <?php if (!empty($error)) echo "<p class='text-rose-600 text-center'>$error</p>"; ?>

            <!-- Dropdown for role -->
            <!-- <select name="role" class="w-full rounded-md p-2 bg-gray-700 text-white" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="guard">Security Guard / Client</option>
                    <option value="applicant">Applicant</option>
                </select> -->

            <!-- Common inputs -->
            <input type="email" name="email" placeholder="Enter your Email" required class="w-full rounded-md p-2 bg-gray-700 text-white">
            <input type="password" name="password" placeholder="Password" required class="w-full rounded-md p-2 bg-gray-700 text-white">

            <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-2 rounded-md">Log in</button>
        </form>
    </div>
</section>