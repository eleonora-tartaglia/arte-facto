<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Affiche les articles du panier dans une vue Blade
    public function index()
    {
        $cartItems = Cart::with('article.category')
            ->where('user_id', Auth::id())
            ->get();

        return view('articles.user.cart', compact('cartItems'));
    }

    // Ajoute un article au panier
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);
    
        $alreadyInCart = Cart::where('user_id', Auth::id())
            ->where('article_id', $request->article_id)
            ->exists();
    
        if ($alreadyInCart) {
            return redirect()->route('cart.index')->with('error', 'Cet article est déjà dans ton panier.');
        }
    
        // Création de l'entrée dans le panier
        Cart::create([
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
            'reserved_at' => now(),
        ]);
    
        // 🎯 Mettre à jour le statut de l'article
        $article = Article::find($request->article_id);
        if ($article && $article->status !== 'sold') {
            $article->status = 'in_cart';
            $article->save();
        }
    
        return redirect()->route('cart.index')->with('success', 'Article ajouté au panier avec succès.');
    }

    // Supprime un article du panier
    public function destroy($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();

        return redirect()->back()->with('success', 'Article retiré du panier.');
    }

    // (Optionnel) Met à jour l’entrée du panier
    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $cart->update([
            'reserved_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Panier mis à jour.');
    }
}
