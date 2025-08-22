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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex">
            <!-- Left side - Form -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 bg-white">
                <div class="w-full max-w-md">
                    <div class="flex justify-between items-center mb-8">
                        <a href="/" class="flex items-center">
                            <img src="{{ asset('assets/img/Logo2.png') }}" alt="Logo" class="h-12 w-auto">
                            <span class="text-2xl font-bold text-black ml-2">EMS</span>
                        </a>
                        @if(Route::has('register'))
                            <div class="text-sm text-gray-600">
                                Already have an account? <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-semibold">Sign in</a>
                            </div>
                        @endif
                    </div>
                    {{ $slot }}
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
