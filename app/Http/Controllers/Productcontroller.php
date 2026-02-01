<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class Productcontroller extends Controller
{
    public function index() {
        $products = Product::paginate(6);
        return view('Produits', ['products' => $products, 'categorie' => 'Tous les produits']);
    }

    public function getProductsByCategorie($cat) {
        $products = Product::where('categorie',$cat)->paginate(6);
        return view('Produits', ['products' => $products, 'categorie' => $cat]);
    }

    
}
