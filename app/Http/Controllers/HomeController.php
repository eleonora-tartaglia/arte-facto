<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::whereNotNull('image')->latest()->take(10)->get();
        return view('welcome', compact('articles'));
    }
}
