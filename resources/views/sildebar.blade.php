<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Mi Aplicación Laravel</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-bold mb-4">Admin Panel</h2>
                <nav>
                    <ul>
                        <li class="mb-2">
                            <a href="{{ route('welcome') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Inicio</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('users.index') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Gestión de Usuarios</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('roles.index') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Gestión de Roles</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('access.index') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Gestión de Accesos</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
