<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Restablecer Contraseña</h1>
        @if (session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email" class="block text-gray-700">Correo Electrónico:</label>
            <input id="email" type="email" name="email" required class="border p-2 w-full">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mt-4">Enviar Enlace de Restablecimiento</button>
        </form>
    </div>
</body>
</html>
