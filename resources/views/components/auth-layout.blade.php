<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Left side - Form -->
        <div class="w-full lg:w-1/2 flex flex-col items-start justify-center p-8 lg:p-12 bg-white">
            <!-- Logo and Navigation -->
            <div class="w-full max-w-md mx-auto mb-8">
                <div class="flex justify-between items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('assets/img/Logo2.png') }}" alt="Logo" class="h-12 w-auto">
                        <span class="text-2xl font-bold text-black ml-2">EMS</span>
                    </a>
                    @if(Route::has('register') && Route::currentRouteName() === 'login')
                        <a href="{{ route('register') }}" class="text-sm text-orange-600 hover:text-orange-700 font-semibold">Create account</a>
                    @endif
                    @if(Route::has('login') && Route::currentRouteName() === 'register')
                        <a href="{{ route('login') }}" class="text-sm text-orange-600 hover:text-orange-700 font-semibold">Sign in</a>
                    @endif
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full max-w-md mx-auto">
                {{ $slot }}
            </div>
        </div>

        <!-- Right side - Brand -->
        <div class="hidden lg:flex w-1/2 bg-black">
            <div class="w-full max-w-xl mx-auto my-auto p-12 relative z-10">
                <h1 class="text-5xl font-bold text-white mb-6 leading-tight">
                    Employee<br>
                    Management<br>
                    System
                </h1>
                <p class="text-lg text-gray-400">
                    Streamline your workforce management with<br>
                    our comprehensive solution
                </p>
                
                <!-- Decorative Elements -->
                <div class="absolute inset-0 overflow-hidden z-0">
                    <div class="absolute top-1/4 right-0 w-64 h-64 bg-orange-500 rounded-full opacity-20 blur-xl animate-pulse"></div>
                    <div class="absolute bottom-1/4 left-0 w-48 h-48 bg-orange-400 rounded-full opacity-20 blur-xl animate-pulse delay-300"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
