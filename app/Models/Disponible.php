<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponible extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fechaDe',
        'fechaA',
        'horaDe',
        'horaA',
        'activo',
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
