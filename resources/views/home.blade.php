<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mi Aplicación Laravel</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <!-- Panel de navegación lateral -->
    <aside class="w-64 bg-gray-800 text-black h-screen p-6">
        <h2 class="text-xl font-bold mb-6">Menú de Navegación</h2>
        <ul>
            <li class="mb-4">
                <a href="{{ route('home') }}" class="mb-4">Inicio</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('users.index') }}" class="mb-4">Gestión de Usuarios</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('roles.index') }}" class="mb-4">Gestión de Roles</a>
            </li>
            <li class="mb-4">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                Cerrar sesión
            </a>
            </li>
        </ul>
    </aside>

    <!-- Contenido principal -->
    <div class="container mx-auto p-6 flex-1">
        <h1 class="text-3xl font-bold mb-4">Bienvenido a Mi Aplicación Laravel</h1>
        <p class="mb-4">Estás autenticado y puedes acceder a esta página.</p>
        <p>Utiliza el menú de navegación para gestionar usuarios y roles.</p>
    </div>
    
</body>
</html>
