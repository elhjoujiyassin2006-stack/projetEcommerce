<header class="bg-black shadow-lg sticky top-0 z-50">
    <nav class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            
            <!-- Logo Section -->
            <a href="/" class="flex items-center gap-3 hover:opacity-90 transition-opacity">
                <img src="/image.png" alt="PrimeShop Logo" class="h-10 w-auto object-contain">
                <span class="text-white font-bold text-xl tracking-wide">PrimeShop</span>
            </a>

            <!-- Desktop Navigation -->
            <ul class="hidden md:flex items-center gap-x-4 lg:gap-x-6 text-gray-200 text-sm font-medium">
                <li>
                    <a href="/" class="hover:text-white transition-colors duration-200 {{ request()->is('/') ? 'text-white' : '' }}">
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="/produits/categorie/Men" class="hover:text-white transition-colors duration-200 {{ request()->is('produits/categorie/Men') ? 'text-white' : '' }}">
                        Men
                    </a>
                </li>
                <li>
                    <a href="/produits/categorie/Women" class="hover:text-white transition-colors duration-200 {{ request()->is('produits/categorie/Women') ? 'text-white' : '' }}">
                        Women
                    </a>
                </li>
                <li>
                    <a href="/a-propos" class="hover:text-white transition-colors duration-200 {{ request()->is('a-propos') ? 'text-white' : '' }}">
                        À propos
                    </a>
                </li>
                <li>
                    <a href="/contact" class="hover:text-white transition-colors duration-200 {{ request()->is('contact') ? 'text-white' : '' }}">
                        Contact
                    </a>
                </li>
               
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-white transition-colors duration-200 {{ request()->routeIs('login') ? 'text-white' : '' }}">
                            Se connecter
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="hover:text-white transition-colors duration-200 {{ request()->routeIs('register') ? 'text-white' : '' }}">
                            S’inscrire
                        </a>
                    </li>
                @endguest

                @auth
                    @if(Auth::user()->role === 'ADMIN')
                        <li>
                            <a href="{{ route('produits.create') }}" class="bg-primary hover:bg-opacity-90 text-white px-3 py-1.5 rounded-lg transition-colors duration-200 text-xs lg:text-sm whitespace-nowrap">
                                Ajouter un produit
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produits.index') }}" class="hover:text-white transition-colors duration-200 {{ request()->routeIs('produits.index') ? 'text-white' : '' }}">
                                Mise à jour des produits
                            </a>
                        </li>
                    @elseif(Auth::user()->role === 'USER')
                        <li>
                            <a href="{{ route('dashboard') }}" class="hover:text-white transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'text-white' : '' }}">
                                Espace Client
                            </a>
                        </li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-200 hover:text-white transition-colors duration-200 text-sm font-medium">
                                Déconnexion
                            </button>
                        </form>
                    </li>
                @endauth
               
            </ul>

            <!-- Mobile Menu Button -->
            <button id="menu-btn" class="md:hidden text-gray-200 hover:text-white focus:outline-none transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <ul class="flex flex-col space-y-3 text-gray-200 text-sm">
                <li>
                    <a href="/" class="block py-2 hover:text-white transition-colors {{ request()->is('/') ? 'text-white' : '' }}">
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="/produits/categorie/Men" class="block py-2 hover:text-white transition-colors {{ request()->is('produits/categorie/Men') ? 'text-white' : '' }}">
                        Men
                    </a>
                </li>
                <li>
                    <a href="/produits/categorie/Women" class="block py-2 hover:text-white transition-colors {{ request()->is('produits/categorie/Women') ? 'text-white' : '' }}">
                        Women
                    </a>
                </li>
                <li>
                    <a href="/a-propos" class="block py-2 hover:text-white transition-colors {{ request()->is('a-propos') ? 'text-white' : '' }}">
                        À propos
                    </a>
                </li>
                <li>
                    <a href="/contact" class="block py-2 hover:text-white transition-colors {{ request()->is('contact') ? 'text-white' : '' }}">
                        Contact
                    </a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="block py-2 hover:text-white transition-colors {{ request()->routeIs('login') ? 'text-white' : '' }}">
                            Se connecter
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="block py-2 hover:text-white transition-colors {{ request()->routeIs('register') ? 'text-white' : '' }}">
                            S’inscrire
                        </a>
                    </li>
                @endguest

                @auth
                    @if(Auth::user()->role === 'ADMIN')
                        <li>
                            <a href="{{ route('produits.create') }}" class="block py-2 text-primary hover:text-opacity-80 transition-colors">
                                Ajouter un produit
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produits.index') }}" class="block py-2 hover:text-white transition-colors {{ request()->routeIs('produits.index') ? 'text-white' : '' }}">
                                Mise à jour des produits
                            </a>
                        </li>
                    @elseif(Auth::user()->role === 'USER')
                        <li>
                            <a href="{{ route('dashboard') }}" class="block py-2 hover:text-white transition-colors {{ request()->routeIs('dashboard') ? 'text-white' : '' }}">
                                Espace Client
                            </a>
                        </li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left py-2 text-gray-200 hover:text-white transition-colors">
                                Déconnexion
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>
