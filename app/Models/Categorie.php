<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom_cat",
        "image", // Adding the image field to the fillable array
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_cat');
    }
}
