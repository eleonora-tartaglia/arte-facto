<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Cart;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.public.show', compact('article'));
    }

    public function userShow($id)
    {
        $article = \App\Models\Article::with('category')->findOrFail($id);
    
        $inOtherCarts = $article->carts()->where('user_id', '!=', auth()->id())->count();

        return view('articles.user.show', compact('article', 'inOtherCarts'));
    }


}
