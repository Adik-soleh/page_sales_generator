<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="font-heading text-2xl font-bold text-dark">Confirm password</h2>
        <p class="text-dark-400 mt-1 text-sm">This is a secure area. Please confirm your password before continuing.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" class="label-text">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="input-field" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit" class="btn-primary w-full">
                Confirm
            </button>
        </div>
    </form>
</x-guest-layout>
