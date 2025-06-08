<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Les champs autorisés au remplissage de masse (mass assignment).
     *
     * Cela protège contre les injections non souhaitées.
     */
    protected $fillable = [
        'title',
        'locality',
        'category',
        'description',
        'price',
        'image',
        'status',
        'type',
    ];

    /**
     * Relations possibles (si tu veux les ajouter plus tard) :
     * - user()    → pour l’auteur ou l’acheteur
     * - bids()    → pour les enchères liées
     * - cart()    → pour les paniers
     * - transaction() → pour les achats finalisés
     *
     * On les ajoutera en temps voulu quand on créera les modèles associés.
     */
}
