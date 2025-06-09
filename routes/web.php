<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Providers\RouteServiceProvider;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalerieController;
use App\Models\Article;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| 🌐 Pages publiques
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Galerie publique
Route::get('/civilisations', [GalerieController::class, 'index'])->name('civilisations.index');

// Galerie avec menu de catégories visible
Route::get('/civilisations/menu', function () {
    return view('articles.public.civilisations', [
        'articles' => Article::with('category')->latest()->get(),
        'showCategoryBar' => true,
    ]);
})->name('civilisations.menu');

// Articles accessibles sans inscription
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

/*
|--------------------------------------------------------------------------
| ✉️ Vérification d'e-mail
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Page d’attente de vérification d’e-mail
    Volt::route('/email/verify', 'auth.verify-email')->name('verification.notice');

    // Lien de validation reçu par mail
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill(); // Marque l’email comme vérifié

        return redirect()->intended(RouteServiceProvider::redirectTo()); // Redirige selon rôle
    })->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
});

/*
|--------------------------------------------------------------------------
| 🛡️ Pages sécurisées (authentifié ET email vérifié)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Page test personnelle
    Route::get('/bonjour', fn () => view('bonjour'))->name('clochette_test');

    // Dashboard pivot redirigeant selon le rôle
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return $user && $user->role === 'admin'
            ? redirect()->route('dashboard.admin')
            : redirect()->route('dashboard.user');
    })->name('dashboard');

    // Dashboards selon le rôle utilisateur
    Route::view('/dashboard/admin', 'dashboard.admin')->name('dashboard.admin');
    Route::view('/dashboard/user', 'dashboard.user')->name('dashboard.user');

    Route::get('/dashboard/user/accueil', [GalerieController::class, 'userHome'])->name('dashboard.user.home');

    // Galerie accessible uniquement aux utilisateurs connectés
    Route::get('/galerie', [GalerieController::class, 'userIndex'])->name('user.civilisations');
    Route::get('/galerie/articles/{article}', [ArticleController::class, 'userShow'])->name('user.articles.show');

    Route::get('/galerie/menu', function () {
        return view('articles.user.civilisations', [
            'articles' => \App\Models\Article::with('category')->latest()->get(),
            'categories' => \App\Models\Category::all(),
            'showCategoryBar' => true,
        ]);
    })->middleware(['auth', 'verified'])->name('user.civilisations.menu');

    // Paramètres utilisateur via Volt
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

/*
|--------------------------------------------------------------------------
| 🌀 Routes auth Livewire Volt
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
