<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Rproductcontroler;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('Master_page');
});

Route::get('/a-propos', function () {
    return view('Apropos');
})->name('about');

Route::get('/contact', function () {
    return view('Contact');
})->name('contact');

Route::get('/dashboard', [Productcontroller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/produits/categorie/{cat}', [Productcontroller::class, 'getProductsByCategorie'])->name('products.category');

// Cart Routes
Route::get('/panier', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/panier/ajouter', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/panier/supprimer', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/panier/modifier', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/panier/vider', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/confirmer-commande', [CartController::class, 'confirmOrder'])->name('order.confirm');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Routes
    Route::get('/espaceclient', [Productcontroller::class, 'espaceclient'])->middleware('useruser');
});

// Admin Routes
Route::middleware(['adminuser'])->group(function () {
    Route::get('/produits/create', [Rproductcontroler::class, 'create'])->name('produits.create');
    Route::post('/produits', [Rproductcontroler::class, 'store'])->name('produits.store');
    Route::get('/produits', [Rproductcontroler::class, 'index'])->name('produits.index');
    Route::get('/produits/{id}/edit', [Rproductcontroler::class, 'edit'])->name('produits.edit');
    Route::put('/produits/{id}', [Rproductcontroler::class, 'update'])->name('produits.update');
    Route::delete('/produits/{id}', [Rproductcontroler::class, 'destroy'])->name('produits.destroy');
    
    Route::get('/espaceadmin', [Productcontroller::class, 'espaceadmin']);
});

// Email Routes
Route::get('/email', [Rproductcontroler::class,'email'])->name('email.form');
Route::post('/send/email', [Rproductcontroler::class, 'sendEmail'])->name('send.email');
Route::get('/send/email', function () {
    return redirect()->route('email.form');
});

// Language Switcher Route
Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fr', 'ar'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('lang.switch');

require __DIR__.'/auth.php';
