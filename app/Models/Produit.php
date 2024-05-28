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

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_cat');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_produit');
    }

    public function paniers()
    {
        return $this->hasMany(Panier::class, 'id_produit');
    }

    public function favoris()
    {
        return $this->hasMany(Favori::class, 'id_produit');
    }
}
