<?php

use App\Http\Controllers\Productcontroller;
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

Route::get('/produits/{cat}', [Productcontroller::class, 'getProductsByCategorie']);
