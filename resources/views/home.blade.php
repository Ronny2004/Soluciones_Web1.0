<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mi Aplicación Laravel</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Bienvenido a Mi Aplicación Laravel</h1>
        <p class="mb-4">Estás autenticado y puedes acceder a esta página.</p>
        <p>Utiliza el menú de navegación para gestionar usuarios y roles.</p>
        
        <div class="mt-4">
            <a href="{{ route('users.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ir a Gestión de Usuarios</a>
            <a href="{{ route('roles.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ir a Gestión de Roles</a>
        </div>

        <div class="mt-8 text-right">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                Cerrar sesión
            </a>
        </div>
    </div>
</body>
</html>
