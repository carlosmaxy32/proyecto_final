<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'contacto_id',
        'fecha',      
        'hora', 
        'servicio_id',   
    ];
    
    function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function contactos()
    {
        return $this->hasMany(Dentista_paciente::class, 'contacto_id');
    }
}
