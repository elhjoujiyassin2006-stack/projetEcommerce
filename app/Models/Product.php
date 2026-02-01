<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'image',
        'categorie',
        'solde',
        'prix'
    ];

    protected $casts = [
        'solde' => 'boolean',
        'prix' => 'float'
    ];
}
