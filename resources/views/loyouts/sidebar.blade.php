<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <aside class="w-64" aria-label="Sidebar">
        <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <ul class="space-y-2">
                <!-- Enlace al Dashboard o página principal -->
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <!-- Gestión de Usuarios -->
                <li>
                    <a href="{{ route('users.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                        <span class="ml-3">Gestión de Usuarios</span>
                    </a>
                </li>

                <!-- Gestión de Roles -->
                <li>
                    <a href="{{ route('roles.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                        <span class="ml-3">Gestión de Roles</span>
                    </a>
                </li>

                <!-- Gestión de Accesos -->
                <li>
                    <a href="{{ route('access.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                        <span class="ml-3">Gestión de Accesos</span>
                    </a>
                </li>

                <!-- Otros enlaces que pudieras tener -->
                <li>
                    <a href="{{ route('some.other.route') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                        <span class="ml-3">Otra Sección</span>
                    </a>
                </li>

                <!-- Ejemplo de enlace a Logout -->
                <li>
                    <a href="{{ route('logout') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="ml-3">Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>
</body>
</html>
