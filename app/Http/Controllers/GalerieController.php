<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class GalerieController extends Controller
{
    public function index(Request $request)
    {
        $categoryName = $request->query('category');

        $articles = Article::with('category')
            ->when($categoryName, function ($query) use ($categoryName) {
                $query->whereHas('category', function ($q) use ($categoryName) {
                    $q->where('name', $categoryName);
                });
            })
            ->latest()
            ->get();

        $categories = Category::all();

        return view('articles.public.civilisations', [
            'articles' => $articles,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

    public function userIndex()
    {
        $articles = \App\Models\Article::with('category')
            // ->where('status', '!=', 'sold') // ❌ on exclut les vendus
            ->latest()
            ->get();

        $categories = \App\Models\Category::all();

        return view('articles.user.civilisations', [
            'articles' => $articles,
            'categories' => $categories,
            'showCategoryBar' => true,
        ]);
    }

    public function userHome()
    {
        $categoryName = request()->query('category');

        $articles = Article::with('category')
            ->when($categoryName, function ($query) use ($categoryName) {
                $query->whereHas('category', function ($q) use ($categoryName) {
                    $q->where('name', $categoryName);
                });
            })
            ->latest()
            ->get();

        return view('articles.user.home', [
            'articles' => $articles,
            'categories' => \App\Models\Category::all(),
            'showCategoryBar' => true,
            'categoryName' => $categoryName,
        ]);
    }
}