<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;

class Galerie extends Component
{
    public function render()
    {
        $articles = Article::latest()->get();

        return view('livewire.articles.galerie', [
            'articles' => $articles
        ]);
    }
}