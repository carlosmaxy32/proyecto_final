<?php

namespace App\Actions\Fortify;

use App\Mail\RegistroExito;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
         
        Validator::make($input, [
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/u', 'max:255'],
            'apellidoP'=>'required|min:2|max:40|alpha',
            'apellidoM'=>'required|min:2|max:40|alpha',
            'sexo'=>'required|min:5|max:6|alpha',
            'fechaN'=>'required|date',
            'telefono'=>'required|min:10|max:17|regex:/^[\+\d][0-9\s]+$/',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'tipousuario'=>'required|numeric',
        ])->validate();
        
        //Mail::to($input['email'])->send(new RegistroExito($input));
        /*codificar password*/
        $input['password'] = Hash::make($input['password']);

        return User::create($input);
        /*return User::create([
            'name' => $input['name'],

            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);*/
    }
}
