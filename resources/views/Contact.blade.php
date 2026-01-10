@extends('Master_page')

@section('title', 'Contact - PrimeShop')

@section('content')
<div class="py-5">
    <h1 class="mb-5 text-center">Nous contacter</h1>
    
    <!-- Cartes d'informations -->
    <div class="row mb-5">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="fas fa-envelope"></i> Email
                    </h5>
                    <p class="card-text">
                        <a href="mailto:info@primeshop.com" class="text-decoration-none">elhjoujiyassin2006@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="fas fa-phone"></i> Téléphone
                    </h5>
                    <p class="card-text">
                        <a href="tel:+212612345678" class="text-decoration-none">+212 6 51 20 87 68</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="fas fa-map-marker-alt"></i> Adresse
                    </h5>
                    <p class="card-text">
                        PrimeShop<br>
                        123 Avenue Principale<br>
                        Tanger 90000
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="fas fa-clock"></i> Horaires
                    </h5>
                    <p class="card-text small">
                        <strong>Lun-Ven:</strong> 09:00-18:00<br>
                        <strong>Sam:</strong> 10:00-16:00<br>
                        <strong>Dim:</strong> Fermé
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- Formulaire de contact -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body p-5">
                    <h3 class="card-title mb-4 text-center">Formulaire de contact</h3>
                    
                    <form method="POST" action="">
                        @csrf

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone (optionnel)</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Votre téléphone">
                        </div>

                        <div class="mb-3">
                            <label for="sujet" class="form-label">Sujet</label>
                            <select class="form-select" id="sujet" name="sujet" required>
                                <option value="">Sélectionnez un sujet</option>
                                <option value="Question produit">Question produit</option>
                                <option value="Commande">Commande</option>
                                <option value="Réclamation">Réclamation</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Votre message..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

