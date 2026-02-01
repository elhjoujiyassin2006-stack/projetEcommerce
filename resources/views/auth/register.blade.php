<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ __('Créer un compte') }}</h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ __('Rejoignez-nous! Inscrivez-vous pour commencer votre expérience') }}</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom complet')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="name" class="block mt-2 w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700 dark:bg-gray-900 dark:text-white transition" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Jean Dupont" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 dark:text-red-400 text-sm" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse Email')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="email" class="block mt-2 w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700 dark:bg-gray-900 dark:text-white transition" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="vous@exemple.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400 text-sm" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />

            <x-text-input id="password" class="block mt-2 w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700 dark:bg-gray-900 dark:text-white transition"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Au moins 8 caractères" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />

            <x-text-input id="password_confirmation" class="block mt-2 w-full px-4 py-3 rounded-lg border-2 border-gray-200 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-700 dark:bg-gray-900 dark:text-white transition"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirmer votre mot de passe" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 dark:text-red-400 text-sm" />
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-2">
            <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 hover:underline transition rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà inscrit? Se connecter') }}
            </a>

            <button type="submit" class="w-full sm:w-auto px-6 py-3 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition shadow-lg">
                {{ __('S\'inscrire') }}
            </button>
        </div>
    </form>
</x-guest-layout>
