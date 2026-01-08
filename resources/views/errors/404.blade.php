@extends('Master_page')

@section('title', '404 - Page Non Trouvée')

@section('content')
<div class="py-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-white p-5 rounded">
                <h1 class="display-1 text-danger mb-4">404</h1>
                <h2 class="mb-4">Page Non Trouvée</h2>
                <p class="lead mb-4">La page que vous recherchez n'existe pas ou a été déplacée.</p>
                
                <div class="alert alert-info" role="alert">
                    <p class="mb-0">Veuillez vérifier l'URL ou <a href="/" class="alert-link">retourner à la page d'accueil</a>.</p>
                </div>

                <div class="mt-4">
                    <a href="/" class="btn btn-primary btn-lg me-2">Accueil</a>
                    <a href="/produits/hiking" class="btn btn-outline-primary btn-lg">Voir les produits</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection