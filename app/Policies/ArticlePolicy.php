<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Tous les utilisateurs connectés peuvent voir la liste
    }

    public function view(User $user, Article $article): bool
    {
        return true; // Tous peuvent consulter un article
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin'; // Seul un admin peut créer
    }

    public function update(User $user, Article $article): bool
    {
        return $user->role === 'admin'; // Seul un admin peut modifier
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->role === 'admin'; // Seul un admin peut supprimer
    }

    public function restore(User $user, Article $article): bool
    {
        return false;
    }

    public function forceDelete(User $user, Article $article): bool
    {
        return false;
    }
}
