<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', // Add other client attributes as needed
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_client');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'id_client');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'id_client');
    }
}
