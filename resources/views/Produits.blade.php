@extends('Master_page')

@section('title', ucfirst($categorie) . ' - Produits')

@section('content')
<div class="py-5">
    <h1 class="mb-4">Produits - {{ ucfirst($categorie) }}</h1>
    
    @if(count($products) > 0)
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-4 mb-4">
                    <div class="card product-card h-100">
                        <img src="{{ asset('imgs/' . $item['image']) }}" alt="{{ $item['nom'] }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['titre'] }}</h5>
                            <p class="card-text text-muted">
                                <strong>Prix:</strong> {{ $item['prix'] }} DH
                            </p>
                            <button class="btn btn-primary w-100">Ajouter au panier</button>
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
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>
                                <strong>{{ $item['titre'] }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-success">{{ $item['prix'] }} DH</span>
                            </td>
                            <td>
                                <img src="{{ asset('imgs/' . $item['image']) }}" alt="{{ $item['nom'] }}" width="100" class="rounded">
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
        <a href="/" class="btn btn-secondary">Retour à l'accueil</a>
    </div>
    {{ $products->links('pagination::bootstrap-5') }}
</div>
@endsection