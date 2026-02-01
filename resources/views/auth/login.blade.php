<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ __('Connexion') }}</h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ __('Bienvenue! Veuillez vous connecter à votre compte') }}</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse Email')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="email" class="block mt-2 w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700 dark:bg-gray-900 dark:text-white transition" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="vous@exemple.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400 text-sm" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />

            <x-text-input id="password" class="block mt-2 w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700 dark:bg-gray-900 dark:text-white transition"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Entrez votre mot de passe" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400 text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 w-4 h-4" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-2">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 hover:underline transition rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif

            <div class="flex gap-3 w-full sm:w-auto">
                <a href="{{ route('register') }}" class="flex-1 sm:flex-none text-center px-4 py-3 rounded-lg border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                    {{ __('S\'inscrire') }}
                </a>
                <button type="submit" class="flex-1 sm:flex-none px-6 py-3 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition shadow-lg">
                    {{ __('Se connecter') }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
