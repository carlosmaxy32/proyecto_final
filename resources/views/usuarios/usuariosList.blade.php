@extends('layouts.fondo')

@section('contenido')
<h1>Usuarios</h1>
    <form action="{{ route('usuario.create') }}" method="POST">
        @method('GET')
        <input type="submit" value="Registrar usuario"><br>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo electrónico</th>
        </tr>
        @foreach($users as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td><a href="{{ route('usuario.show', [$usuario->id]) }}">{{ $usuario->name }}</a></td>
                <td>{{ $usuario->apellidoP }}</td>
                <td>{{ $usuario->apellidoM }}</td>
                <td>{{ $usuario->email }}</td>
            </tr>
        @endforeach
    </table>

@endsection