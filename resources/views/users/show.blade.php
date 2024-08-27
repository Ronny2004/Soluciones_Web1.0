<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario - Mi Aplicación Laravel</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Detalles del Usuario</h1>
        <div class="bg-white shadow-md rounded p-6">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong> {{ $user->role->name }}</p>
        </div>
        <div class="mt-4">
            <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Editar Usuario</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Eliminar Usuario</button>
            </form>
            <a href="{{ route('users.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Regresar</a>
        </div>
    </div>
</body>
</html>
