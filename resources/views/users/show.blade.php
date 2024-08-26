<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white p-8 shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-6">Show User</h1>
        <p class="mb-4"><strong>Name:</strong> {{ $user->name }}</p>
        <p class="mb-4"><strong>Email:</strong> {{ $user->email }}</p>
        <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:underline">Edit</a>
        <a href="{{ route('users.index') }}" class="ml-4 text-blue-500 hover:underline">Back</a>
    </div>
</body>
</html>
