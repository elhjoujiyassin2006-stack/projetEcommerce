@extends('Master_page')

@section('title', 'À propos - PrimeShop')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">À Propos de PrimeShop</h1>
            <p class="text-xl text-gray-600">L'excellence au service de votre style depuis 2024.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <img src="https://images.unsplash.com/photo-1614164185128-e4ec99c436d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Nos Montres de Luxe" class="rounded-2xl shadow-2xl border border-gray-100">
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Notre Vision</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    PrimeShop est né d'une passion pour la mode et du désir de rendre les produits premium accessibles. Nous croyons que chaque client mérite une expérience d'achat exceptionnelle, alliant qualité rigoureuse et service personnalisé.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-primary/20 text-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-gray-700 font-medium">Sélection rigoureuse de produits premium</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-primary/20 text-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-gray-700 font-medium">Engagement éco-responsable</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-primary/5 rounded-3xl p-12 text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Nos Valeurs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="text-3xl font-bold text-primary mb-2">Qualité</div>
                    <p class="text-sm text-gray-600">Aucun compromis sur la durabilité et les matériaux.</p>
                </div>
                <div>
                    <div class="text-3xl font-bold text-primary mb-2">Confiance</div>
                    <p class="text-sm text-gray-600">Des milliers de clients satisfaits à travers le pays.</p>
                </div>
                <div>
                    <div class="text-3xl font-bold text-primary mb-2">Innovation</div>
                    <p class="text-sm text-gray-600">Toujours à la pointe des dernières tendances.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
