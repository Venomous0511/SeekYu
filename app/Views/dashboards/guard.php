<?php

use App\Core\Auth;

?>

<header class="bg-indigo-600 p-4 text-white flex justify-between">
    <h1 class="text-xl font-bold">Security Guard Dashboard</h1>
    <a href="<?= BASE_URL ?>/logout" class="hover:underline">Logout</a>
</header>

<main class="p-6">
    <h2 class="text-lg font-semibold">Welcome, <?= htmlspecialchars(Auth::user()['name']) ?>!</h2>
</main>