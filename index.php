<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seekyu - Recruitment Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen w-screen bg-cover bg-center relative">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-70 z-0"></div>

    <!-- Navbar -->
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="./" class="text-2xl font-bold text-white hover:text-indigo-400">Seekyu</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-x-6">
                <a href="src/auth/login.php" class="text-sm font-semibold text-white hover:text-indigo-400">Log in →</a>
            </div>
        </nav>
    </header>

    <!-- Sections -->
    <main class="relative z-10">

        <!-- Home -->
        <section id="home" class="section flex items-center justify-center min-h-screen text-center">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-bold text-white sm:text-6xl">Apply as a Security Guard or Hire One</h1>
                <p class="mt-6 text-lg text-gray-300">Welcome to SeekYu – Your trusted platform to apply as a security personnel or to hire one.</p>
                <div class="mt-10 flex justify-center gap-x-6">
                    <a href="src/auth/login.php" class="rounded-md bg-indigo-500 px-4 py-2 text-white font-semibold hover:bg-indigo-400">Get started</a>
                    <a href="#" onclick="showSection('learnmore')" class="text-white font-semibold hover:text-indigo-400">Learn more →</a>
                </div>
            </div>
        </section>

        <!-- Learn More -->
        <section id="learnmore" class="section hidden min-h-screen flex items-center justify-center px-6">
            <div class="bg-gray-950 bg-opacity-80 p-10 rounded-xl text-center max-w-3xl">
                <h2 class="text-3xl font-bold text-white">Why Choose Seekyu?</h2>
                <p class="mt-4 text-gray-300">
                    Seekyu connects qualified security guards with companies and clients in need. Whether you're applying for a job or hiring trusted personnel, our platform ensures efficiency and reliability.
                </p>
            </div>
        </section>
    </main>

    <script src="public/js/main.js"></script>
</body>

</html>