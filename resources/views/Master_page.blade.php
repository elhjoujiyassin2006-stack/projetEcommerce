<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- CSRF Token for Security -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Security Headers -->

    
    <title>@yield('title', 'PrimeShop - E-Commerce Premium')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#B87333', // Copper/Bronze from logo
                        secondary: '#1e293b', // Existing dark theme
                        accent: '#22d3ee', // Cyan arrow from logo
                    }
                }
            }
        }
    </script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        
        main {
            flex: 1;
            padding: 2rem 0;
        }
        
        .product-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        
        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Smooth transitions */
        a, button {
            transition: all 0.2s ease;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        /* Alert animations */
        .alert {
            animation: slideDown 0.3s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    @include('Menu')
    
    <main>
        <div class="container mx-auto px-4">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong>Succès!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <strong>Erreur!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                    <strong>Attention!</strong> {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(request()->is('/'))
            <!-- Hero Section -->
            <div class="relative bg-black overflow-hidden rounded-2xl mb-12">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1547996160-81dfa63595aa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         alt="Hero Background" 
                         class="w-full h-full object-cover opacity-30">
                </div>
                <div class="relative container mx-auto px-6 py-24 md:py-32">
                    <div class="max-w-2xl text-white">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                            Découvrez l'Excellence <span class="text-primary">PrimeShop</span>
                        </h1>
                        <p class="text-lg md:text-xl text-gray-300 mb-8 leading-relaxed">
                            Explorez notre collection exclusive de produits premium. Qualité, style et élégance réunis pour votre satisfaction.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="/produits/categorie/Men" class="inline-flex items-center justify-center px-8 py-3 bg-primary hover:bg-opacity-90 text-white font-semibold rounded-lg transition-colors duration-200">
                                Collection Homme
                            </a>
                            <a href="/produits/categorie/Women" class="inline-flex items-center justify-center px-8 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition-colors duration-200">
                                Collection Femme
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Categories -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Nos Collections</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Men Category -->
                    <a href="/produits/categorie/Men" class="group relative overflow-hidden rounded-2xl aspect-[4/3] block">
                        <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                             alt="Collection Montres Hommes" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8">
                            <div>
                                <h3 class="text-2xl font-bold text-white mb-2">Hommes</h3>
                                <p class="text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">
                                    Découvrir la collection
                                </p>
                            </div>
                        </div>
                    </a>

                    <!-- Women Category -->
                    <a href="/produits/categorie/Women" class="group relative overflow-hidden rounded-2xl aspect-[4/3] block">
                        <img src="https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                             alt="Collection Montres Femmes" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8">
                            <div>
                                <h3 class="text-2xl font-bold text-white mb-2">Femmes</h3>
                                <p class="text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">
                                    Découvrir la collection
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Features Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 text-primary rounded-full mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Produits Premium</h3>
                    <p class="text-gray-600 text-sm">Une sélection rigoureuse des meilleures marques et produits.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 text-primary rounded-full mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Livraison Rapide</h3>
                    <p class="text-gray-600 text-sm">Expédition express pour recevoir vos articles au plus vite.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary/10 text-primary rounded-full mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Paiement Sécurisé</h3>
                    <p class="text-gray-600 text-sm">Transactions 100% sécurisées pour votre tranquillité d'esprit.</p>
                </div>
            </div>
            @endif

            @yield('content')
        </div>
    </main>
    
    @include('Footer')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- CSRF Token Setup for AJAX -->
    <script>
        // Setup CSRF token for all AJAX requests
        const token = document.querySelector('meta[name="csrf-token"]');
        if (token) {
            window.axios = window.axios || {};
            window.axios.defaults = window.axios.defaults || {};
            window.axios.defaults.headers = window.axios.defaults.headers || {};
            window.axios.defaults.headers.common = window.axios.defaults.headers.common || {};
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        }
        
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>