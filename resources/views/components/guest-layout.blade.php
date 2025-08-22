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
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 bg-white">
                <div class="w-full max-w-md">
                    <!-- Logo and Title -->
                    <div class="flex justify-between items-center mb-8">
                        <a href="/" class="flex items-center">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-12 w-auto">
                            <span class="text-2xl font-bold text-black ml-2">EMS</span>
                        </a>
                        @if(Route::has('register') && Route::currentRouteName() === 'register')
                            <div class="text-sm text-gray-600">
                                Already have an account? <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-semibold">Sign in</a>
                            </div>
                        @endif
                        @if(Route::has('login') && Route::currentRouteName() === 'login')
                            <div class="text-sm text-gray-600">
                                Need an account? <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-semibold">Register</a>
                            </div>
                        @endif
                    </div>
                    <!-- Form Content -->
                    {{ $slot }}
                    </div>
                </div>
            </div>
            
            <!-- Right side - Illustration -->
            <div class="hidden lg:flex w-1/2 bg-black justify-center items-center">
                <div class="max-w-md">
                    <!-- EMS Text -->
                    <h1 class="text-5xl font-bold text-white mb-6">Employee<br>Management<br>System</h1>
                    
                    <!-- Description -->
                    <p class="text-gray-400 text-lg mt-4 mb-8">
                        Streamline your workforce management with<br>our comprehensive solution
                    </p>
                    
                    <!-- Abstract shapes -->
                    <div class="relative">
                        <div class="absolute -top-40 -right-40">
                            <div class="w-64 h-64 bg-orange-500 rounded-full opacity-20 animate-pulse"></div>
                        </div>
                        <div class="absolute -bottom-20 -left-20">
                            <div class="w-48 h-48 bg-orange-400 rounded-full opacity-20 animate-pulse delay-300"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
