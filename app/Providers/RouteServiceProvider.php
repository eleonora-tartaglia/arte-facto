<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public static function redirectTo(): string
    {
        $user = auth()->user();

        if (!$user) return '/login';

        return $user->role === 'admin'
        ? '/dashboard/admin'
        : '/dashboard/user';
    }

    public function boot(): void
    {
        // Ce code ne fait rien ici, mais Laravel attend un boot()
    }
}
