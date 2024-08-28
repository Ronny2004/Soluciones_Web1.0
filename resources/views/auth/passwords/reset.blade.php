<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecimiento de Contraseña</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Restablecer Contraseña</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva Contraseña</label>
                <input id="password" type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirmar Nueva Contraseña</label>
                <input id="password-confirm" type="password" name="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Restablecer Contraseña</button>
        </form>
    </div>
</body>
</html>
