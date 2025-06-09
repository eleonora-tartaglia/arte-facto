<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Injecter les catégories dans toutes les vues
        View::composer('*', function ($view) {
            $view->with('nav_categories', Category::all());
        });
    }
}
