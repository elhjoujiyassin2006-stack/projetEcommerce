<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
class Rproductcontroler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('Produits',['products'=> $products, 'categorie' => 'all']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-produit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $titre = $request->input('titre');
        $contenu = $request->input('contenu');
        $prix = $request->input('prix');
        $categorie = $request->input('categorie');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
        $uploadedFileUrl = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
            'folder' => 'products',
        ])['secure_url'];

        Product::insert([
            'titre' => $titre,
            'contenu' => $contenu,
            'prix' => $prix,
            'categorie' => $categorie,
            'image' => $uploadedFileUrl,
            'solde' => 0
        ]);

        return redirect()->route('produits.index')->with('success', 'Product created successfully.');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('edit-produit', compact('product'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);    
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);   
        $product->titre = $request->input('titre');
        $product->contenu = $request->input('contenu');
        $product->prix = $request->input('prix');
        $product->categorie = $request->input('categorie');
        
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);
            $uploadedFileUrl = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'folder' => 'products',
            ])['secure_url'];
            $product->image = $uploadedFileUrl;
        }
        $product->save();
        return redirect()->route('produits.index')->with('success', 'Product updated successfully.');}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('produits.index')->with('success', 'Product deleted successfully.');
    }
}
