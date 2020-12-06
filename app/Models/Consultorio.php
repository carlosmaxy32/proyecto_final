<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'direccion',
        'colonia',
        'municipio',
        'estado',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    
}
