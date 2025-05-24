<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Smart Pad Jr' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 antialiased">
    <!-- Nav Bar -->
    <nav class="bg-white/80 backdrop-blur-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="group flex items-center space-x-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                                <span class="text-white font-bold text-xl">K</span>
                            </div>
                            <span class="text-xl font-bold text-gray-800 group-hover:text-indigo-600 transition-colors">
                                Kids Drawing & Learning
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white/80 backdrop-blur-sm border-t border-gray-100 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center space-y-2">
                <div class="flex items-center space-x-2">
                    <div
                        class="w-6 h-6 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center">
                        <span class="text-white font-bold text-sm">K</span>
                    </div>
                    <span class="text-gray-600 font-medium">Kids Drawing & Learning</span>
                </div>
                <p class="text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
