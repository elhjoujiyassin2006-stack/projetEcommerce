<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class Productcontroller extends Controller
{
    public function getProductsByCategorie($cat) {
     $products = Product::where('categorie',$cat)->get();
     return view('Produits', ['products' =>$products,'categorie'=>$cat]);

    }

    
}
