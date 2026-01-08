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

    <div class="row mt-5">
        <div class="col-md-6 mb-4">
            <div class="card product-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Équipement Hiking</h5>
                    <p class="card-text">Trouvez tout ce dont vous avez besoin pour vos aventures en montagne. Sacs à dos, tentes, montres GPS et bien plus.</p>
                    <a href="/produits/hiking" class="btn btn-primary">Voir la catégorie</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card product-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Électroménager</h5>
                    <p class="card-text">Équipez votre cuisine avec nos appareils électroménagers de qualité. Machine à laver, fours, micro-ondes et plus.</p>
                    <a href="/produits/electromenager" class="btn btn-primary">Voir la catégorie</a>
                </div>
            </div>
        </div>
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