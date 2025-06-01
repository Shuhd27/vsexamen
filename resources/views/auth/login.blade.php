<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <br><br><br>
    <!-- Guest message -->
    <div class="max-w-md mx-auto mb-6 p-4 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-md shadow-sm">
        {{ __('Ben je een klant? Dan hoef je geen account aan te maken. Je kunt de website gewoon gebruiken als gast om pakketten te boeken en contact met ons op te nemen.') }}
    </div>


    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
        @csrf

        <!-- Email Address -->
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email')" class="block text-gray-700 dark:text-gray-300 mb-1" />
            <x-text-input
                id="email"
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:border-green-500 focus:ring-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:focus:ring-green-600 dark:focus:border-green-600 transition"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <x-input-label for="password" :value="__('Password')" class="block text-gray-700 dark:text-gray-300 mb-1" />
            <x-text-input
                id="password"
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:border-green-500 focus:ring-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:focus:ring-green-600 dark:focus:border-green-600 transition"
                type="password"
                name="password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="mb-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer text-gray-700 dark:text-gray-300">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 dark:border-gray-600 text-green-600 shadow-sm focus:ring-green-500 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800" />
                <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
            <a
                href="{{ route('password.request') }}"
                class="text-sm text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-600 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ml-3 px-6 py-2 text-white bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-2 rounded-md transition">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>