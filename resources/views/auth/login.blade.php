@section('title', 'Login')

<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="font-heading text-2xl font-bold text-dark">Welcome back</h2>
        <p class="text-dark-400 mt-1">Sign in to your account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="label-text">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="input-field" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="label-text">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="input-field" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-md border-dark-200 text-dark-800 shadow-sm focus:ring-dark-300" name="remember">
                <span class="ms-2 text-sm text-dark-400">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-dark-400 hover:text-dark font-medium transition-colors" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <div class="mt-6">
            <button type="submit" class="btn-primary w-full">
                Sign In
            </button>
        </div>

        <div class="mt-6 text-center">
            <p class="text-sm text-dark-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-dark hover:underline font-semibold transition-colors">
                    Create one
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
