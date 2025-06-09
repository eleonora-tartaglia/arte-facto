<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Tu peux enregistrer ici d'autres services si besoin
    }

    public function boot(): void
    {
        // 📦 Injecter toutes les catégories dans toutes les vues (optimisé)
        View::composer('*', function ($view) {
            static $categories = null;

            if (is_null($categories)) {
                $categories = Category::all();
            }

            $view->with('nav_categories', $categories);
        });
    }
}
