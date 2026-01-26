<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Cloudinary\Cloudinary;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = product::all();
        return response()->json($products);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $products = new Product();
        $products->titre = $request->input('titre');
        $products->contenu = $request->input('contenu');
        $products->prix = $request->input('prix');
        $products->categorie = $request->input('categorie');
        $products->solde = $request->input('solde', false); // Default to false if not provided

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
            $products->image = $uploadedFileUrl;
        }

        $products->save();

        return response()->json(['message' => 'produit ajouté avec succès!', 'product' => $products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
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
        return response()->json(['message' => 'Product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully.']);
    }
    public function filter(string $q)
    {
        $products = Product::where('categorie', 'like', '%' . $q . '%')
            ->orWhere('titre', 'like', '%' . $q . '%')
            ->get();
        return response()->json($products);
    }
}
