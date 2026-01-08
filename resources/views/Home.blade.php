@extends('Master_page')

@section('title', 'Accueil - E-Commerce')

@section('content')
<div class="py-5">
    <div class="jumbotron bg-white rounded-lg p-5 mb-4">
        <h1 class="display-4">Bienvenue sur E-Commerce</h1>
        <p class="lead">Découvrez nos produits de qualité en équipement outdoor et électroménager</p>
        <hr class="my-4">
        <p>Explorez nos catégories et trouvez les produits qui vous correspondent.</p>
    </div>

    

    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="mb-4">Pourquoi nous choisir ?</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-3">
                    <div class="bg-white p-4 rounded">
                        <h5>Qualité Garantie</h5>
                        <p>Tous nos produits sont sélectionnés pour leur qualité et leur durabilité.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <div class="bg-white p-4 rounded">
                        <h5>Livraison Rapide</h5>
                        <p>Nous livrons vos commandes rapidement et en toute sécurité.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <div class="bg-white p-4 rounded">
                        <h5>Support Client</h5>
                        <p>Notre équipe est disponible pour répondre à toutes vos questions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection