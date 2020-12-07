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

    public function setDireccionAttribute($value)
    {
        return $this->attributes['direccion'] = ucwords(strtolower($value));
    }

    public function setColoniaAttribute($value)
    {
        return $this->attributes['colonia'] = ucwords(strtolower($value));
    }

    public function setMunicipioAttribute($value)
    {
        return $this->attributes['municipio'] = ucwords(strtolower($value));
    }

    public function setEstadoAttribute($value)
    {
        return $this->attributes['estado'] = ucwords(strtolower($value));
    }

    public function getLocalizacionAttribute()
    {
        return $this->colonia . ", ". $this->municipio . ", " . $this->estado;
    }
    
}
