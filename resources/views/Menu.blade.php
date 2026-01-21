<nav class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 text-white font-semibold">
                <img src="{{ asset('imgs/logo.png') }}" alt="PrimeShop Logo" class="h-10 w-auto">
                <span>PrimeShop</span>
            </a>

            <!-- Bouton mobile -->
            <button id="menu-btn"
                class="md:hidden text-gray-300 hover:text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Menu desktop -->
            <ul class="hidden md:flex space-x-6 text-gray-300">
                <li><a href="/" class="hover:text-white">Accueil</a></li>
                <li><a href="/produits/categorie/Men" class="hover:text-white">Men</a></li>
                <li><a href="/produits/categorie/Women" class="hover:text-white">Women</a></li>
                <li><a href="/a-propos" class="hover:text-white">À propos</a></li>
                <li><a href="/contact" class="hover:text-white">Contact</a></li>
                <li><a href="{{ route('produits.create') }}" class="hover:text-white">Ajouter</a></li>
            </ul>
        </div>
    </div>

    <!-- Menu mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-800">
        <ul class="flex flex-col space-y-2 px-4 py-4 text-gray-300">
            <li><a href="/" class="hover:text-white">Accueil</a></li>
            <li><a href="/produits/categorie/Men" class="hover:text-white">Men</a></li>
            <li><a href="/produits/categorie/Women" class="hover:text-white">Women</a></li>
            <li><a href="/a-propos" class="hover:text-white">À propos</a></li>
            <li><a href="/contact" class="hover:text-white">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Script toggle -->
<script>
    document.getElementById('menu-btn').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
