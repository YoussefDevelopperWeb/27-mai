<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_commande', 'montant', 'dateP', 'methode'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande');
    }
}
