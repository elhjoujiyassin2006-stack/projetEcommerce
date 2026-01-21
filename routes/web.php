<?php

use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Rproductcontroler;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/a-propos', function () {
    return view('About');
});

Route::get('/contact', function () {
    return view('Contact');
});

Route::get('/produits/categorie/{cat}', [Productcontroller::class, 'getProductsByCategorie']);

Route::resource('produits',Rproductcontroler::class);
