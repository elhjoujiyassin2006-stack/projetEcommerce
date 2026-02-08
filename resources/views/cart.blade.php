@extends('Master_page')

@section('title', 'Mon Panier')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Mon Panier</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    @if(count($cartItems) > 0)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Desktop View -->
            <div class="hidden md:block">
                <table class="w-full">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Produit</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Prix unitaire</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Quantité</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Sous-total</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($cartItems as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        @if($item['image'])
                                            <img src="{{ $item['image'] }}" alt="{{ $item['titre'] }}" class="w-20 h-20 object-cover rounded">
                                        @else
                                            <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center">
                                                <span class="text-gray-400">Pas d'image</span>
                                            </div>
                                        @endif
                                        <div>
                                            <h3 class="font-semibold text-gray-800">{{ $item['titre'] }}</h3>
                                            @if(isset($item['categorie']))
                                                <p class="text-sm text-gray-500">{{ $item['categorie'] }}</p>
                                            @endif
                                            @if(isset($item['solde']) && $item['solde'])
                                                <span class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded mt-1">SOLDE -20%</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if(isset($item['solde']) && $item['solde'])
                                        <div>
                                            <span class="text-gray-400 line-through">{{ number_format($item['prix'], 2) }} DH</span>
                                            <span class="text-red-600 font-semibold block">{{ number_format($item['prix'] * 0.8, 2) }} DH</span>
                                        </div>
                                    @else
                                        <span class="font-semibold text-gray-800">{{ number_format($item['prix'], 2) }} DH</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="99" 
                                               class="w-20 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded transition-colors text-sm">
                                            ✓
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $prix = isset($item['solde']) && $item['solde'] ? $item['prix'] * 0.8 : $item['prix'];
                                        $subtotal = $prix * $item['quantity'];
                                    @endphp
                                    <span class="font-bold text-gray-800">{{ number_format($subtotal, 2) }} DH</span>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.remove') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce produit du panier ?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile View -->
            <div class="md:hidden divide-y divide-gray-200">
                @foreach($cartItems as $item)
                    <div class="p-4">
                        <div class="flex gap-4 mb-4">
                            @if($item['image'])
                                <img src="{{ $item['image'] }}" alt="{{ $item['titre'] }}" class="w-24 h-24 object-cover rounded">
                            @else
                                <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center">
                                    <span class="text-gray-400 text-xs">Pas d'image</span>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 mb-1">{{ $item['titre'] }}</h3>
                                @if(isset($item['categorie']))
                                    <p class="text-sm text-gray-500 mb-1">{{ $item['categorie'] }}</p>
                                @endif
                                @if(isset($item['solde']) && $item['solde'])
                                    <div class="mb-2">
                                        <span class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded">SOLDE -20%</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-400 line-through text-sm">{{ number_format($item['prix'], 2) }} DH</span>
                                        <span class="text-red-600 font-semibold block">{{ number_format($item['prix'] * 0.8, 2) }} DH</span>
                                    </div>
                                @else
                                    <span class="font-semibold text-gray-800">{{ number_format($item['prix'], 2) }} DH</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between gap-2">
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                <label class="text-sm text-gray-600">Qté:</label>
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="99" 
                                       class="w-16 px-2 py-1 border border-gray-300 rounded text-sm">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                    Modifier
                                </button>
                            </form>
                            
                            <form action="{{ route('cart.remove') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                        
                        @php
                            $prix = isset($item['solde']) && $item['solde'] ? $item['prix'] * 0.8 : $item['prix'];
                            $subtotal = $prix * $item['quantity'];
                        @endphp
                        <div class="mt-2 text-right">
                            <span class="text-sm text-gray-600">Sous-total: </span>
                            <span class="font-bold text-gray-800">{{ number_format($subtotal, 2) }} DH</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <p class="text-gray-600 mb-2">Nombre total d'articles: <span class="font-semibold">{{ $itemCount }}</span></p>
                    <p class="text-2xl font-bold text-gray-800">Total: <span class="text-blue-600">{{ number_format($total, 2) }} DH</span></p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <form action="{{ route('cart.clear') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment vider le panier ?')"
                                class="w-full sm:w-auto bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors font-semibold">
                            Vider le panier
                        </button>
                    </form>
                    
                    <a href="{{ route('checkout') }}" 
                       class="w-full sm:w-auto bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-lg transition-colors font-semibold text-center">
                        Passer la commande
                    </a>
                </div>
            </div>
        </div>

        <!-- Continue Shopping -->
        <div class="mt-6 text-center">
            <a href="/" class="text-blue-600 hover:text-blue-700 font-semibold">
                ← Continuer vos achats
            </a>
        </div>

    @else
        <div class="bg-white shadow-lg rounded-lg p-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Votre panier est vide</h2>
            <p class="text-gray-500 mb-6">Découvrez nos produits et ajoutez vos articles préférés au panier</p>
            <a href="/" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg transition-colors font-semibold">
                Commencer mes achats
            </a>
        </div>
    @endif
</div>
@endsection
