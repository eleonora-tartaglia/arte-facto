<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Article;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirm(Cart $cart)
    {
        // Vérifie si l'article appartient bien au panier de l'utilisateur connecté
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $article = $cart->article;

        // Vérifie que l'article n'est pas déjà vendu
        if ($article->status === 'sold') {
            return redirect()->route('cart.index')->with('error', 'Cet article a déjà été vendu.');
        }

        // Marquer l'article comme vendu
        $article->status = 'sold';
        $article->save();

        // Enregistre la transaction dans la table dédiée
        
        Transaction::create([
            'user_id'    => Auth::id(),
            'article_id' => $article->id,
            'price'      => $article->price,
        ]);

        // Supprime tous les autres paniers qui ont cet article

        Cart::where('article_id', $article->id)
            ->where('user_id', '!=', Auth::id())
            ->delete();

        return redirect()->route('order.thanks')->with([
            'success' => 'Commande validée avec succès ✨',
            'article_id' => $article->id,
        ]);
    }

    public function thankYou()
    {
        $article = null;

        if (session('article_id')) {
            $article = Article::with('category')->find(session('article_id'));
        }

        return view('articles.user.thank-you', compact('article'));
    }
}
