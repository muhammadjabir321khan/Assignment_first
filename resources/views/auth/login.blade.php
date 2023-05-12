<x-guest-layout>

    <body style="background-color: #1a202c;">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-red-500" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" style="background-color: #2d3748; padding: 24px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                <x-text-input id="email" style="background-color: #4a5568; color: #cbd5e0; border-color: #4a5568; border-radius: 4px; padding: 8px; margin-top: 8px; width: 100%; box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-300" />

                <x-text-input id="password" style="background-color: #4a5568; color: #cbd5e0; border-color: #4a5568; border-radius: 4px; padding: 8px; margin-top: 8px; width: 100%; box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-gray-300">
                    <input id="remember_me" type="checkbox" style="border-radius: 4px; border-color: #cbd5e0; box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);" class="rounded border-gray-400 text-gray-500 shadow-sm focus:ring-blue-500" name="remember">
                    <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-6">
                @if (Route::has('password.request'))
                <a class="text-gray-300 hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}" style="margin-right: 8px;">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-primary-button class="ml-3 bg-dark" style="padding: 8px 16px;">
                    {{ __('Log in') }}
                </x-primary-button>

            </div>
        </form>
    </body>
</x-guest-layout>