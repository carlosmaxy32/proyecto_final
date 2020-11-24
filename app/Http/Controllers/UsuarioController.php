<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('usuarios.usuariosList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.usuariosForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'tipousuario' => $request->tipousuario ?? 3
        ]);
        $request->validate([
            'name'=>'required|min:2|max:255|regex:/^[a-zA-Z\s]+$/u',
            'apellidoP'=>'required|min:2|max:40|alpha',
            'apellidoM'=>'required|min:2|max:40|alpha',
            'sexo'=>'required|min:5|max:6|alpha',
            'fechaN'=>'required|date',
            'telefono'=>'required|min:10|max:17|regex:/^[\+\d][0-9\s]+$/',
            'email'=>'required|email',
            'password'=>'required|min:8|max:40|alpha_num',
            'tipousuario'=>'required|numeric',
        ]);
        User::create($request->all());
        return redirect(route('usuario.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('usuarios.usuarioShow', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view('usuarios.usuariosForm', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $request->merge([
            'tipousuario' => $usuario->tipousuario
        ]);
        $request->validate([
            'name'=>'required|min:2|max:255|regex:/^[a-zA-Z\s]+$/u',
            'apellidoP'=>'required|min:2|max:40|alpha',
            'apellidoM'=>'required|min:2|max:40|alpha',
            'sexo'=>'required|min:5|max:6|alpha',
            'fechaN'=>'required|date',
            'telefono'=>'required|min:10|max:17|regex:/^[\+\d][0-9\s]+$/',
            'email'=>'required|email',
            'password'=>'required|min:8|max:40|alpha_num',
            'tipousuario'=>'required|numeric',
        ]);
        User::where('id', $usuario->id)->update($request->except('_method', '_token'));
        return redirect(route('usuario.show', [$usuario]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect(route('usuario.index'));
    }
}
