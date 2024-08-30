<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación Laravel')</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">

    <!-- Incluye el sidebar -->
    @include('layouts.sidebar')

    <!-- Contenido principal -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>

</body>
</html>
