<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white p-8 shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-6">Edit User</h1>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                <input type="password" id="password" name="password" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input mt-1 block w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
</body>
</html>
