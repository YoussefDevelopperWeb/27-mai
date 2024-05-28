<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produit'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }
}
