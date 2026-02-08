@extends('Master_page')

@section('title', 'Finaliser la commande')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Finaliser votre commande</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Formulaire de commande -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Informations de livraison</h2>
                
                <form action="{{ route('order.confirm') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom complet *</label>
                            <input type="text" id="nom" name="nom" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   value="{{ Auth::check() ? Auth::user()->name : '' }}">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   value="{{ Auth::check() ? Auth::user()->email : '' }}">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone *</label>
                        <input type="tel" id="telephone" name="telephone" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <div class="mb-4">
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">Adresse de livraison *</label>
                        <input type="text" id="adresse" name="adresse" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Numéro et nom de rue">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="ville" class="block text-sm font-medium text-gray-700 mb-2">Ville *</label>
                            <input type="text" id="ville" name="ville" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="code_postal" class="block text-sm font-medium text-gray-700 mb-2">Code postal *</label>
                            <input type="text" id="code_postal" name="code_postal" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="pays" class="block text-sm font-medium text-gray-700 mb-2">Pays *</label>
                            <input type="text" id="pays" name="pays" required value="Maroc"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes de commande (optionnel)</label>
                        <textarea id="notes" name="notes" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Instructions spéciales pour la livraison..."></textarea>
                    </div>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-6">Mode de paiement</h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" id="paiement_livraison" name="mode_paiement" value="livraison" checked
                                   class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            <label for="paiement_livraison" class="ml-3 block text-sm font-medium text-gray-700 cursor-pointer">
                                Paiement à la livraison
                            </label>
                        </div>
                        
                        <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" id="paiement_carte" name="mode_paiement" value="carte"
                                   class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            <label for="paiement_carte" class="ml-3 block text-sm font-medium text-gray-700 cursor-pointer">
                                Carte bancaire (prochainement disponible)
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-lg transition-colors text-lg">
                        Confirmer la commande
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Résumé de la commande -->
        <div class="lg:col-span-1">
            <div class="bg-white shadow-lg rounded-lg p-6 sticky top-24">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Résumé de la commande</h2>
                
                <div class="space-y-4 mb-6">
                    @foreach($cartItems as $item)
                        <div class="flex items-start gap-3 pb-3 border-b border-gray-200">
                            @if($item['image'])
                                <img src="{{ $item['image'] }}" alt="{{ $item['titre'] }}" 
                                     class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                    <span class="text-gray-400 text-xs">N/A</span>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 text-sm">{{ $item['titre'] }}</h4>
                                <p class="text-gray-600 text-xs">Quantité: {{ $item['quantity'] }}</p>
                                @php
                                    $prix = isset($item['solde']) && $item['solde'] ? $item['prix'] * 0.8 : $item['prix'];
                                @endphp
                                <p class="text-gray-800 font-semibold text-sm mt-1">
                                    {{ number_format($prix * $item['quantity'], 2) }} DH
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="space-y-2 mb-4 text-sm">
                    <div class="flex justify-between text-gray-600">
                        <span>Sous-total</span>
                        <span>{{ number_format($total, 2) }} DH</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Livraison</span>
                        <span class="text-green-600 font-semibold">Gratuite</span>
                    </div>
                </div>
                
                <div class="border-t border-gray-300 pt-4 mb-4">
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-gray-800">Total</span>
                        <span class="text-2xl font-bold text-blue-600">{{ number_format($total, 2) }} DH</span>
                    </div>
                </div>
                
                <div class="bg-blue-50 rounded-lg p-4 text-sm text-gray-700">
                    <div class="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <p class="font-semibold text-blue-800 mb-1">Livraison gratuite</p>
                            <p class="text-gray-600">Profitez de la livraison gratuite sur toutes vos commandes.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('cart.view') }}" 
                       class="block text-center text-blue-600 hover:text-blue-700 font-semibold text-sm">
                        ← Retour au panier
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
