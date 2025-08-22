<x-auth-layout>
<div class="mb-8">
    <h1 class="text-3xl font-bold text-black mb-2">Welcome back!</h1>
    <p class="text-gray-600">Sign in to your EMS account</p>
</div>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
<form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="bi bi-envelope text-gray-400"></i>
            </div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors" placeholder="Enter your email" />
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="bi bi-lock text-gray-400"></i>
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors" placeholder="Enter your password" />
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <div class="flex items-center justify-between">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
            <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-orange-500 hover:text-orange-600 font-semibold">Forgot password?</a>
        @endif
    </div>
    <button type="submit" class="w-full py-2 px-4 bg-orange-600 text-white font-bold rounded-lg shadow hover:bg-orange-700 transition">Sign in</button>
    @if (Route::has('register'))
        <div class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600 font-semibold">Create one now</a>
        </div>
    @endif
</form>
</x-auth-layout>
