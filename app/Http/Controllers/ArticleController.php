<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.public.show', compact('article'));
    }

    public function userShow($id)
    {
        $article = \App\Models\Article::findOrFail($id);

        return view('articles.user.show', compact('article'));
        // dd($article);
    }

}
