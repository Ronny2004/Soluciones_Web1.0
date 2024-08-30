<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<aside class="w-64 bg-gray-800 text-black h-screen p-6">
    <h2 class="text-xl font-bold mb-6">Menú de Navegación</h2>
    <ul>
        <li class="mb-4">
            <a href="{{ route('home') }}" class="text-black hover:text-gray-400">Inicio</a>
        </li>
        <li class="mb-4">
            <a href="{{ route('users.index') }}" class="text-black hover:text-gray-400">Gestión de Usuarios</a>
        </li>
        <li class="mb-4">
            <a href="{{ route('roles.index') }}" class="text-black hover:text-gray-400">Gestión de Roles</a>
        </li>
    </ul>
</aside>
</body>
</html>
