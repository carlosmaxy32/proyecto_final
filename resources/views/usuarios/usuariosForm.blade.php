@extends('layouts.fondo')

@section('contenido')
    <h1>Registrar</h1>
    
    @if(isset($usuario))
        <form action="{{ route('usuario.update', [$usuario])}}"  method="POST">
            @method('patch')
    @else
        <form action="{{ route('usuario.store') }}"  method="POST">
    @endif
        @csrf
        <label for= "name"> Nombre(s): </label>
        <input type="text" name="name" value="{{ old('name') ?? $usuario->name ?? ''}}"><br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for= "apellidoP"> Apellido Paterno: </label>
        <input type="text" name="apellidoP" value="{{ old('apellidoP') ?? $usuario->apellidoP ?? ''}}"><br>
        @error('apellidoP')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for= "apellidoM"> Apellido Materno: </label>
        <input type="text" name="apellidoM" value="{{ old('apellidoM') ?? $usuario->apellidoM ?? ''}}"><br>
        @error('apellidoM')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for= "sexo"> Sexo: </label>
            <input type="radio" name="sexo" value="Hombre" {{ old('sexo') == 'Hombre' ? 'checked' : ''}} {{ isset($usuario) && $usuario->sexo == 'Hombre' ? 'checked' : ''}}>Hombre
            <input type="radio" name="sexo" value="Mujer" {{ old('sexo') == 'Mujer' ? 'checked' : ''}} {{ isset($usuario) && $usuario->sexo == 'Mujer' ? 'checked' : ''}}>Mujer
        <br>
        @error('sexo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="fechaN">Fecha de Nacimiento: </label>
        <input type="date" name="fechaN" value="{{ old('fechaN') ?? $usuario->fechaN ?? ''}}"><br>
        @error('fechaN')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="telefono">Teléfono: </label>
        <input type="text" name="telefono" value="{{ old('telefono') ?? $usuario->telefono ?? ''}}"><br>
        @error('telefono')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="email">Correo electrónico: </label>
        <input type="email" name="email" value="{{ old('email') ?? $usuario->email ?? ''}}"><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="password">Contraseña: </label>
        <input type="password" name="password" value="{{ old('password') ?? $usuario->password ?? ''}}"><br>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="submit" value="Enviar"><br>
    </form>
@endsection
