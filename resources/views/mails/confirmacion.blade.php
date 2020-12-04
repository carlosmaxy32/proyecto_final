<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Confirmación</title>
</head>
<body>
    <p>Hola {{ $distressCall['name'] }}!! Bienvenid@ a Dental House.</p>
    <p>Tu registro fue exitoso</p>
    <ul>
        <li>Tu correo: {{ $distressCall['email'] }}</li>
        <li>Tu contraseña: {{ $distressCall['password'] }}</li>
    </ul>
</body>
</html>