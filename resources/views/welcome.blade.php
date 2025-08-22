
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMS — Employee Management System</title>
    <meta name="description" content="EMS: manage employees, assign tasks, and secure access with roles & permissions. Streamline workflows and track performance.">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="EMS — Employee Management System">
    <meta property="og:description" content="Manage employees, assign tasks, and track performance with ease.">
    <meta property="og:image" content="{{ asset('assets/img/Logo2.png') }}">
    <meta property="og:url" content="{{ url('/') }}">

    <!-- Fonts and Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta property="og:image" content="{{ asset('assets/img/Logo2.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <link rel="icon" href="{{ asset('assets/img/Logo2.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased bg-white text-gray-800">

    <!-- Navigation -->
    <header class="bg-black text-white shadow sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center px-4 py-3">
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('assets/img/Logo2.png') }}" alt="EMS Logo" class="h-10 w-auto">
                <span class="text-xl font-bold">EMS</span>
            </a>
            <nav class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:text-orange-500 focus:ring-2 focus:ring-orange-400 px-3 py-2 rounded">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-orange-500 focus:ring-2 focus:ring-orange-400 px-3 py-2 rounded">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-400">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-white text-center py-20 px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-black mb-4">
                {{ __('Welcome to Employee Management System') }}
            </h1>
            <p class="text-lg text-gray-600 mb-8">
                Streamline your workforce, manage tasks efficiently, and empower your employees with role-based access.
            </p>
            <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg text-lg font-medium focus:outline-none focus:ring-2 focus:ring-orange-400">
                Get Started
            </a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <i class="bi bi-clipboard-check text-orange-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Task Management</h3>
                    <p class="text-gray-600">Assign, track, and manage tasks effortlessly with real-time updates.</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <i class="bi bi-people text-orange-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Employee Management</h3>
                    <p class="text-gray-600">Maintain detailed employee records and track performance metrics.</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <i class="bi bi-shield-lock text-orange-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Role-Based Access</h3>
                    <p class="text-gray-600">Secure and flexible role permissions powered by Spatie RBAC.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-3xl font-bold mb-4">Why Choose EMS?</h2>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start"><i class="bi bi-check-circle-fill text-orange-500 mr-2"></i> Simplifies task and employee management</li>
                    <li class="flex items-start"><i class="bi bi-check-circle-fill text-orange-500 mr-2"></i> Scalable and secure architecture</li>
                    <li class="flex items-start"><i class="bi bi-check-circle-fill text-orange-500 mr-2"></i> Accessible from any device, anytime</li>
                </ul>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('assets/img/Logo2.png') }}" alt="EMS Logo" class="h-40 w-auto">
            </div>
        </div>
    </section>

    <!-- Dynamic Counts -->
    <section class="py-12 bg-gray-100 text-center">
        <h2 class="text-2xl font-bold mb-6">Our Growing Platform</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="text-center">
                <span class="block text-4xl font-bold text-orange-500">{{ $employeeCount ?? '—' }}</span>
                <span class="text-gray-700">Employees</span>
            </div>
            <div class="text-center">
                <span class="block text-4xl font-bold text-orange-500">{{ $taskCount ?? '—' }}</span>
                <span class="text-gray-700">Tasks</span>
            </div>
        </div>
    </section>

    <!-- CTA Band -->
    <section class="bg-orange-500 text-white py-12 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Boost Your Workplace Productivity?</h2>
        <p class="mb-6">Get started now and manage your employees and tasks with ease.</p>
        <a href="{{ route('register') }}" class="bg-white text-orange-500 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white">
            Register Now
        </a>
        <a href="{{ route('login') }}" class="ml-4 px-6 py-3 rounded-lg border border-white text-white hover:bg-white hover:text-orange-500 focus:outline-none focus:ring-2 focus:ring-white">
            Login
        </a>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-gray-400 py-8">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <h3 class="text-white font-semibold mb-2">About EMS</h3>
                <p class="text-sm">A powerful platform to manage employees, tasks, and workflows efficiently.</p>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-2">Quick Links</h3>
                <ul class="space-y-1">
                    <li><a href="{{ url('/') }}" class="hover:text-orange-500">Home</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-orange-500">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-orange-500">Register</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-2">Contact</h3>
                <p class="text-sm">Email: support@ems.com</p>
            </div>
        </div>
        <div class="text-center text-gray-500 text-sm mt-8">
            &copy; {{ date('Y') }} EMS. All rights reserved.
        </div>
    </footer>
</body>
</html>