<?php

namespace App\Http\Controllers;

use App\Models\Article;

class GalerieController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        // dd($articles);

        return view('articles.public.civilisations', compact('articles'));
    }

    public function userIndex()
    {
        $articles = Article::all();

        return view('articles.user.civilisations', compact('articles'));
    }

}
