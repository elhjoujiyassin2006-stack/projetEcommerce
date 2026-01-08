<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/produits/{cat}', function ($cat) { 
    $produits = []; 
 
    if ($cat == 'hiking') { 
        $produits = [ 
            ["nom" => "Sac à dos", "prix" => 200, "image" => "img5.jpeg"], 
            ["nom" => "Tente", "prix" => 300, "image" => "img6.jpeg"], 
            ["nom" => "Montre GPS", "prix" => 150, "image" => "img4.jpeg"] 
        ]; 
    } 
    elseif ($cat == 'electromenager') { 
        $produits = [ 
            ["nom" => "Machine à laver", "prix" => 3000, "image" => "img3.jpeg"], 
            ["nom" => "Four", "prix" => 1500, "image" => "img1.jpeg"], 
            ["nom" => "Micro-onde", "prix" => 1000, "image" => "img2.jpeg"] 
        ]; 
    } 
 
    return view('Produits', [ 
        'products' => $produits, 
        'categorie' => $cat 
    ]); 
});
