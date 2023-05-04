<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <label for="remember_me" class="inline-flex label cursor-pointer px-0 mt-4">
            <span class="label-text order-1 ml-3">{{ __('Remember me') }}</span>
            <input id="remember_me" type="checkbox" name="remember" class="checkbox" />
        </label>

        <div class="flex justify-end mt-4">
            @if (Route::has('register'))
                <a class="link text-sm mr-3" href="{{ route('register') }}">
                    {{ __("Don't have an account?") }}
                </a>
            @endif

            @if (Route::has('password.request'))
                <a class="link text-sm" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        </div>

        <div class="flex justify-end mt-5">
            <x-primary-button class="btn-wide">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
