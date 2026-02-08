@extends('Master_page')

@section('title', ucfirst($categorie) . ' - Produits')

@section('content')
<div class="py-5">
    <h1 class="mb-4 text-3xl font-bold text-gray-800">{{ $categorie === 'Tous les produits' ? $categorie : 'Produits - ' . ucfirst($categorie) }}</h1>

    
    @if(count($products) > 0)
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-4 mb-4">
                    <div class="card product-card h-100 position-relative">
                        @auth
                            @if(Auth::user()->role !== 'ADMIN' && !in_array(strtolower($categorie), ['men', 'women']))
                                <span class="badge bg-danger position-absolute" style="top: 10px; left: 10px; font-size: 0.9rem; z-index: 10; padding: 8px 12px;">
                                    <i class="fas fa-tag me-1"></i> -20% SOLDE
                                </span>
                            @endif
                        @endauth
                        <img src="{{ $item['image'] }}" alt="{{ $item['nom'] }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['titre'] }}</h5>
                            @auth
                                @if(Auth::user()->role !== 'ADMIN' && !in_array(strtolower($categorie), ['men', 'women']))
                                    <p class="card-text">
                                        <span class="text-decoration-line-through text-muted">{{ $item['prix'] }} DH</span>
                                        <strong class="text-danger ms-2">{{ number_format($item['prix'] * 0.8, 2) }} DH</strong>
                                    </p>
                                @else
                                    <p class="card-text text-muted">
                                        <strong>Prix:</strong> {{ $item['prix'] }} DH
                                    </p>
                                @endif
                            @else
                                <p class="card-text text-muted">
                                    <strong>Prix:</strong> {{ $item['prix'] }} DH
                                </p>
                            @endauth
                            
                            @if(!Auth::check() || Auth::user()->role !== 'ADMIN')
                                <form action="{{ route('cart.add') }}" method="POST" class="w-100 mt-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                        Ajouter au panier
                                    </button>
                                </form>
                            @endif
                            @if(Auth::check() && Auth::user()->role === 'ADMIN')
                                <div class="mt-4 flex gap-2">
                                    <a href="{{ route('produits.edit', $item['id']) }}" class="inline-block px-4 py-2 bg-primary text-white rounded hover:bg-opacity-90 transition-colors text-sm">Éditer</a>
                                    <form action="{{ route('produits.destroy', $item['id']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition-colors text-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="my-5">
        
        <h3 class="mb-4">Vue Détaillée</h3>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        @auth
                            @if(Auth::user()->role !== 'ADMIN' && !in_array(strtolower($categorie), ['men', 'women']))
                                <th>Solde</th>
                            @endif
                        @endauth
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>
                                <strong>{{ $item['titre'] }}</strong>
                                @auth
                                    @if(Auth::user()->role !== 'ADMIN' && !in_array(strtolower($categorie), ['men', 'women']))
                                        <span class="badge bg-danger ms-2">-20%</span>
                                    @endif
                                @endauth
                            </td>
                            <td>
                                @auth
                                    @if(Auth::user()->role !== 'ADMIN' && !in_array(strtolower($categorie), ['men', 'women']))
                                        <span class="text-decoration-line-through text-muted">{{ $item['prix'] }} DH</span>
                                    @else
                                        <span class="badge bg-success">{{ $item['prix'] }} DH</span>
                                    @endif
                                @else
                                    <span class="badge bg-success">{{ $item['prix'] }} DH</span>
                                @endauth
                            </td>
                            @auth
                                @if(Auth::user()->role !== 'ADMIN' && !in_array(strtolower($categorie), ['men', 'women']))
                                    <td>
                                        <span class="badge bg-success fs-6">{{ number_format($item['prix'] * 0.8, 2) }} DH</span>
                                    </td>
                                @endif
                            @endauth
                            <td>
                                <img src="{{ $item['image'] }}" alt="{{ $item['nom'] }}" width="100" class="rounded">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Aucun produit</h4>
            <p>Désolé, aucun produit n'est disponible dans cette catégorie.</p>
        </div>
    @endif
    
    <div class="mt-4">
        <a href="/" class="inline-block px-4 py-2 bg-secondary text-white rounded hover:bg-opacity-90 transition-colors">Retour à l'accueil</a>
    </div>
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection

@push('scripts')
<script>
    function addToCart(productName) {
        // Create a custom alert or toast
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-success alert-dismissible fade show fixed-bottom m-3';
        alertDiv.style.maxWidth = '400px';
        alertDiv.style.zIndex = '9999';
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
            <strong>Succès!</strong> ${productName} a été ajouté au panier.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        document.body.appendChild(alertDiv);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alertDiv);
            bsAlert.close();
        }, 3000);
    }
</script>
@endpush