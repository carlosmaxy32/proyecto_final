<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="{{ route('usuario.create') }}">Registrar Paciente</a>
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
                <td><a href="{{ route('usuario.show', [$usuario->id]) }}">{{ $usuario->nombre }}</a></td>
                <td>{{ $usuario->apellidoP }}</td>
                <td>{{ $usuario->apellidoM }}</td>
                <td>{{ $usuario->email }}</td>
            </tr>
        @endforeach
    </table>
	</header>
