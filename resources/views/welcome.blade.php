<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connecto</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-700 ">
    <header class="sticky top-0 z-50 bg-gray-800 shadow py-4">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex justify-between items-center">
            <div class="flex-shrink-0">
                <img class="h-10 w-14" src="img/logo.png" alt="">
              </div>
            <nav class="space-x-4">
                <a href="{{ route('login') }}" class="text-yellow-500 font-semibold">Login</a>
                <a href="{{ route('register') }}" class="text-yellow-500 font-semibold">Register</a>
            </nav>
        </div>
    </header>

    <!-- Main content of the page -->
    <main class="flex items-center justify-center min-h-screen">
        <div class="max-w-2xl text-center">
            <h1 class="text-4xl font-semibold mb-6 text-gray-200">Welcome to Connecto</h1>
            <p class="text-lg text-gray-300">Connecting the world with ease and efficiency.</p>
        </div>
    </main>
</body>
</html>