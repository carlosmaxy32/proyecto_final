<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista_paciente extends Model
{
    use HasFactory;
    protected $table = 'dentista_paciente';

    protected $fillable = [
        'dentista_id',
        'paciente_id',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }
}
