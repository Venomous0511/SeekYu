<?php

use App\Core\Auth;

?>

<header class="bg-indigo-600 p-4 text-white flex justify-between">
    <h1 class="text-xl font-bold">Super Admin Dashboard</h1>
    <a href="<?= BASE_URL ?>/logout" class="hover:underline">Logout</a>
</header>

<main class="p-6">
    <h2 class="text-lg font-semibold">Welcome, <?= htmlspecialchars(Auth::user()['name']) ?>!</h2>
    <p class="mt-4">You have full control over the system.</p>

    <div class="mt-6">
        <a href="#" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-400">Manage Users</a>
        <a href="#" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-400">System Settings</a>
    </div>
</main>