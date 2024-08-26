<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Mi Aplicación Laravel</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Usuarios</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Crear Nuevo Usuario</a>
        <ul class="mt-4">
            @foreach ($users as $user)
                <li class="flex justify-between items-center bg-white shadow-md rounded p-4 mb-2">
                    <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">{{ $user->name }}</a>
                    <div class="space-x-2">
                        <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">Editar</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
