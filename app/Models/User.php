<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellidoP','apellidoM','sexo','fechaN','telefono','email','password','tipousuario'];
}
