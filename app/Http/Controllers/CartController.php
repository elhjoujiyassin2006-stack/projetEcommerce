<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Afficher les articles du panier depuis la session
     */
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $itemCount = 0;
        
        foreach ($cart as $item) {
            $total += $item['prix'] * $item['quantity'];
            $itemCount += $item['quantity'];
        }
        
        return view('cart', [
            'cartItems' => $cart,
            'total' => $total,
            'itemCount' => $itemCount
        ]);
    }

   
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);
        $productId = $product->id;
        $quantity = $request->quantity ?? 1;

        // Vérifier si le produit existe déjà dans le panier
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Ajouter le nouveau produit au panier
            $cart[$productId] = [
                'id' => $product->id,
                'titre' => $product->titre,
                'prix' => $product->prix,
                'quantity' => $quantity,
                'image' => $product->image ?? null,
                'categorie' => $product->categorie ?? null,
                'solde' => $product->solde ?? false
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès');
    }

    /**
     * Supprimer un article du panier
     */
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produit supprimé du panier');
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans le panier');
    }

    /**
     * Mettre à jour la quantité d'un article dans le panier
     */
    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            if ($request->quantity <= 0) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Produit supprimé du panier');
            }

            $cart[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Quantité mise à jour avec succès');
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans le panier');
    }

    /**
     * Traiter le processus de checkout
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Votre panier est vide');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['prix'] * $item['quantity'];
        }

        return view('checkout', [
            'cartItems' => $cart,
            'total' => $total
        ]);
    }

    /**
     * Vider complètement le panier
     */
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('cart.view')->with('success', 'Panier vidé avec succès');
    }

    /**
     * Confirmer la commande
     */
    public function confirmOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Votre panier est vide');
        }

        // Ici vous pouvez ajouter la logique pour sauvegarder la commande dans la base de données
        // Pour l'instant, on vide simplement le panier
        
        session()->forget('cart');
        
        return redirect('/')->with('order_success', 'Votre commande a été confirmée avec succès !');
    }
}
