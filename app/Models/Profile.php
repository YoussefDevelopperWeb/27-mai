<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client', 'adresse', 'ville', 'cp_client'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
