<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client', 'id_produit', 'qtt_produit', 'date_commande', 'montant'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public function factures()
    {
        return $this->hasMany(Facture::class, 'id_commande');
    }

    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'id_commande');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'id_commande');
    }
}
