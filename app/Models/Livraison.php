<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_commande', 'titre_liv', 'methode_liv', 'statut'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande');
    }
}
