<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',        
    ];

    public function getServicioAttribute()
    {
        return $this->nombre . " ". $this->descripcion;
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
