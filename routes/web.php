<?php

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

Route::get('/produits/{cat}', function ($cat) { 
    $produits = []; 
 
    if ($cat == 'Nos montres') { 
        $produits = [ 
            ["nom" => "Rolex", "prix" => 300, "image" => "m1.jpeg"], 
            ["nom" => "Tephea", "prix" => 500, "image" => "m2.jpeg"], 
            ["nom" => "Time Master", "prix" => 850, "image" => "m3.jpeg"],
            ["nom" => "Cartier", "prix" => 350, "image" => "m4.jpeg"] ,
            ["nom" => "Patek Philippe", "prix" => 950, "image" => "m5.jpeg"] 
        ]; 
    } 
   
 
    return view('Produits', [ 
        'products' => $produits, 
        'categorie' => $cat 
    ]); 
});
