<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600" style="margin-bottom: 1rem; font-size: 0.875rem; color: #4b5563;">
        <!-- {{ __('Forgot your password? Enter your Email ') }} -->
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" style="margin-bottom: 60px; height: 251px;" class="bg-white shadow-md sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
        @csrf

        <div style="margin-bottom: 1rem; padding-left: 20px; padding-right: 20px;">
            <x-input-label for="email" :value="__('Email')" style="color: #111827;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus style="display: block; margin-top: 10px; width: 100%; padding: 0.5rem; border-radius: 0.25rem; border-width: 1px; border-color: #e2e8f0; background-color: #fff; color: #111827;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="margin-top: 10px" />
        </div>

        <div class="flex items-center justify-end mt-5" style="padding: -6px -5px 10px 10px;">
            <x-primary-button style="background-color: #059669; border-color: #059669; color: #fff; display: inline-flex; justify-content: center; align-items: center; padding: 0.75rem 1.5rem; font-size: 0.875rem; font-weight: 600; text-transform: none; border-radius: 0.25rem; border-width: 1px; cursor: pointer; margin-top: 100px;">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>