<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="font-heading text-2xl font-bold text-dark">Forgot password</h2>
        <p class="text-dark-400 mt-1 text-sm">No problem. Enter your email and we'll send you a reset link.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="label-text">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="input-field" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit" class="btn-primary w-full">
                Email Password Reset Link
            </button>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm text-dark-400 hover:text-dark font-medium transition-colors">
                ← Back to login
            </a>
        </div>
    </form>
</x-guest-layout>
