<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit', 'prix_produit', 'image_produit', 'stock_produit',
        'reference_produit', 'description_produit', 'id_cat'
    ];
}
