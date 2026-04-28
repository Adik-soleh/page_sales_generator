<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="font-heading text-2xl font-bold text-dark">Verify your email</h2>
        <p class="text-dark-400 mt-1 text-sm">Thanks for signing up! Please verify your email address by clicking the link we just sent you.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn-primary">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-dark-400 hover:text-dark font-medium transition-colors">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
