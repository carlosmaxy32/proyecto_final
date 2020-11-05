<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Usuario</title>
</head>
<body>
    <h1>Información Usuario</h1>
    <a href="{{ route('usuario.edit', [$usuario]) }}">Editar Paciente</a><br>
    <form action="{{ route('usuario.destroy', [$usuario])}}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" value="Eliminar"><br>
    </form>
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
	</header>