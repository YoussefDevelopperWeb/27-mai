<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client', 'description_fb', 'evaluation_fb', 'titre_fb'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}

