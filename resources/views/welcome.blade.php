<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Mi Aplicación Laravel</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-background">
    <header class="bg-primary text-white p-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-4xl font-bold">Bienvenido a Laravel</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('welcome') }}" class="hover:underline text-secondary">Inicio</a></li>
                    <li><a href="{{ route('users.index') }}" class="bg-secondary text-white py-2 px-4 rounded hover:bg-blue-800">Gestión de Usuarios</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-semibold text-textPrimary">¡Hola!</h2>
            <p class="mt-4 text-lg text-textSecondary">Esta es una aplicación de ejemplo construida con Laravel y Tailwind CSS. Utiliza el menú de arriba para navegar a diferentes secciones de la aplicación.</p>
        </div>

        <div class="text-center mt-8">
            <h3 class="text-2xl font-semibold text-textPrimary">Gestión de Usuarios</h3>
            <p class="mt-2 text-lg text-textSecondary">Administra tus usuarios, crea, edita o elimina usuarios fácilmente.</p>
            <a href="{{ route('users.index') }}" class="mt-4 inline-block bg-secondary text-white py-2 px-4 rounded hover:bg-blue-800">Ver usuarios</a>
        </div>
    </main>
</body>
</html>
