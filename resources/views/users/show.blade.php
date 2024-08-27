<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Usuario - Mi Aplicación Laravel</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Detalles de Usuario</h1>
        <div class="bg-white shadow-md rounded p-4">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong> {{ $user->role->name }}</p>
        </div>
        <a href="{{ route('users.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mt-4 inline-block">Volver</a>
    </div>
</body>
</html>
