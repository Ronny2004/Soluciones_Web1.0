<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Accesos</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Gestión de Accesos</h1>
        @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
        <!-- Botón para abrir el formulario de creación -->
        <div class="flex justify-between items-center mb-4">
            <button id="create-user-btn" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Crear Usuario
            </button>
            <!-- Campo de búsqueda -->
            <input type="text" id="search" class="border border-gray-300 p-2 rounded" placeholder="Buscar por nombre o correo...">
        </div>
        
        <!-- Listado de usuarios -->
        <ul id="user-list" class="mt-4">
            @foreach ($users as $user)
                <li class="flex justify-between items-center bg-white shadow-md rounded p-4 mb-2">
                    <div>
                        <span class="font-semibold">{{ $user->name }}</span>
                        <span class="text-gray-500">({{ $user->email }})</span>
                        <span class="ml-2 badge">{{ $user->role->name }}</span>
                    </div>
                    <div class="space-x-2">
                        <!-- Botón de Editar -->
                        <button class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600" onclick="editUser({{ $user->id }})">Editar</button>
                        <!-- Botón de Eliminar -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        
        <!-- Modal Formulario de Crear Usuario -->
        <div id="create-user-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Crear Usuario</h2>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password" class="border border-gray-300 p-2 rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="role_id" class="block text-sm font-medium text-gray-700">Rol</label>
                        <select name="role_id" id="role_id" class="border border-gray-300 p-2 rounded w-full" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="cancel-btn" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 mr-2">Cancelar</button>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Script para mostrar y ocultar el modal
        document.getElementById('create-user-btn').addEventListener('click', function() {
            document.getElementById('create-user-modal').classList.remove('hidden');
        });

        document.getElementById('cancel-btn').addEventListener('click', function() {
            document.getElementById('create-user-modal').classList.add('hidden');
        });

        // Función de búsqueda de usuarios
        document.getElementById('search').addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            document.querySelectorAll('#user-list li').forEach(function(user) {
                const name = user.querySelector('span.font-semibold').textContent.toLowerCase();
                const email = user.querySelector('span.text-gray-500').textContent.toLowerCase();
                if (name.includes(query) || email.includes(query)) {
                    user.style.display = '';
                } else {
                    user.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
