@extends('layouts.app')

@section('contenido')
    <h1>Información Usuario</h1>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Teléfono</th>
            <th>Correo eletrónico</th>
        </tr>

        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->apellidoP }}</td>
            <td>{{ $usuario->apellidoM }}</td>
            <td>{{ $usuario->sexo }}</td>
            <td>{{ $usuario->fechaN }}</td>
            <td>{{ $usuario->telefono }}</td>
            <td>{{ $usuario->email }}</td>
        </tr>

    </table>

    <form action="{{ route('usuario.edit', [$usuario])}}" method="POST">
    @method('GET')
    @csrf
    <br><input type="submit" value="Editar"> 
    </form>
    <form action="{{ route('usuario.destroy', [$usuario])}}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" value="Eliminar">
    </form>
    <form action="{{ route('usuario.index')}}" method="POST">
        @method('GET')
         <input type="submit" value="Regresar">
    </form>
@endsection