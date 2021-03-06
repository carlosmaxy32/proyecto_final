<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Builder\Class_;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellidoP',
        'apellidoM',
        'sexo',
        'fechaN',
        'telefono',
        'email',
        'password',
        'tipousuario'
    ];

    public function consultorio()
    {
        return $this->hasOne(Consultorio::class);
    }

    public function disponible()
    {
        return $this->hasOne(Disponible::class);
    }


    public function contactos()
    {
        return $this->hasMany(Dentista_paciente::class);
    }

    
    public function getNombreCompletoAttribute()
    {
        return $this->name . " ". $this->apellidoP . " " . $this->apellidoM;
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords(strtolower($value));
    }

    public function setApellidoPAttribute($value)
    {
        return $this->attributes['apellidoP'] = ucfirst(strtolower($value));
    }

    public function setApellidoMAttribute($value)
    {
        return $this->attributes['apellidoM'] = ucfirst(strtolower($value));
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
