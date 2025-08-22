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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col justify-center items-center">
            <div class="flex flex-col md:flex-row w-full max-w-4xl bg-white shadow-xl rounded-xl overflow-hidden">
                <!-- Left: Logo & Form -->
                <div class="flex-1 flex flex-col justify-center items-center p-8">
                    <div class="flex flex-col items-center mb-6">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="EMS Logo" class="h-24 mb-2">
                        <span class="text-2xl font-extrabold text-orange-600 tracking-wide">EMS</span>
                    </div>
                    <div class="w-full max-w-md">
                        @yield('content')
                </div>
            </div>
            
            <!-- Right side - Illustration -->
            <div class="hidden lg:flex w-1/2 bg-black justify-center items-center p-8">
                <div class="max-w-md relative">
                    <!-- EMS Text -->
                    <h1 class="text-6xl font-bold text-white mb-6">Employee<br>Management<br>System</h1>
                    
                    <!-- Abstract shapes and animation -->
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute transform rotate-45 z-0">
                            <div class="w-48 h-48 bg-orange-500 rounded-full opacity-20 absolute -top-20 -right-20 animate-pulse"></div>
                            <div class="w-36 h-36 bg-orange-400 rounded-full opacity-20 absolute top-40 right-20 animate-pulse delay-300"></div>
                            <div class="w-24 h-24 bg-orange-300 rounded-full opacity-20 absolute top-10 right-40 animate-pulse delay-700"></div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <p class="text-gray-400 text-lg relative z-10 mt-4">
                        Streamline your workforce management with our comprehensive solution
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
