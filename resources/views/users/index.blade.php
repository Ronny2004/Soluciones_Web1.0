<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    <!-- Panel de navegación lateral -->
    <aside class="w-64 bg-gray-800 text-black h-screen p-6">
        <h1 class="text-xl font-bold mb-6">Menú de Navegación</h1>
        <ul>
            <li class="mb-4">
                <a href="{{ route('home') }}" class="text-black hover:underline">Inicio</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('users.index') }}" class="text-black hover:underline">Gestión de Usuarios</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('roles.index') }}" class="text-black hover:underline">Gestión de Roles</a>
            </li>
        </ul>
    </aside>

    <!-- Contenido principal -->
    <div class="container mx-auto p-6 flex-1">

        <!-- Título de la página -->
        <h1 class="text-3xl font-bold mb-4 truncate">Gestión de Usuarios</h1>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('users.index') }}" class="flex mb-4 items-center">
            <input type="text" name="search" placeholder="Buscar usuario" class="flex-grow px-4 py-2 border rounded-lg text-lg mr-2" required>
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 border-2 border-blue-500 hover:border-blue-600 text-lg">
                Buscar
            </button>
        </form>

        <!-- Botón para abrir el modal -->
        <div class="mb-4">
            <button id="openModalBtn" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 border-2 border-blue-500 hover:border-blue-600">
                Crear Nuevo Usuario
            </button>
        </div>

        <!-- Lista de usuarios -->
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md mx-auto">
                <thead>
                    <tr class="bg-gray-100 text-left border-b">
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-center">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="mailto:{{ $user->email }}" class="text-blue-600 hover:underline">{{ $user->email }}</a>
                            </td>
                            <td class="px-4 py-2 text-center">{{ $user->role->name }}</td>
                            <td class="px-4 py-2 text-center">
                                <!-- Botón de acciones -->
                                <div class="relative inline-block text-left">
                                    <button type="button" class="bg-gray-200 text-gray-600 py-1 px-3 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        ...
                                    </button>
                                    <div class="actions-menu absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                                        <div class="py-1">
                                            <a href="{{ route('users.edit', $user) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Editar</a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Menú de usuario -->
    <div class="fixed bottom-4 right-4 z-50">
        <div class="relative inline-block text-left">
            <button id="userMenuBtn" class="bg-gray-800 text-gray-300 rounded-full p-3 shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 user-icon-border">
                <i class="fas fa-user-circle text-2xl user-icon"></i>
            </button>
            <div id="userMenu" class="actions-menu absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-1">
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Configuración</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">Ayuda</a>
                    <!-- Agregar formulario de cierre de sesión aquí -->
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Cerrar sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="userModal" class="fixed z-10 inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4">Crear Usuario</h2>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
                    <select name="role_id" class="w-full px-3 py-2 border rounded" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModalBtn" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openModalBtn = document.getElementById('openModalBtn');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const userModal = document.getElementById('userModal');
            const userMenuBtn = document.getElementById('userMenuBtn');
            const userMenu = document.getElementById('userMenu');
            
            // Mostrar modal
            openModalBtn.addEventListener('click', () => {
                userModal.classList.remove('hidden');
            });

            // Cerrar modal
            closeModalBtn.addEventListener('click', () => {
                userModal.classList.add('hidden');
            });

            // Mostrar menú de usuario
            userMenuBtn.addEventListener('click', () => {
                userMenu.classList.toggle('hidden');
            });

            // Cerrar menú de usuario al hacer clic fuera
            window.addEventListener('click', (e) => {
                if (!userMenu.contains(e.target) && !userMenuBtn.contains(e.target)) {
                    userMenu.classList.add('hidden');
                }
            });

            // Mostrar menú de acciones en la tabla
            document.querySelectorAll('.actions-menu').forEach(menu => {
                menu.previousElementSibling.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            });
        });
    </script>
</body>
</html>
