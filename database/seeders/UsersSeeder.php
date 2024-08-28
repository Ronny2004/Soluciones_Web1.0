<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Asegúrate de tener este modelo importado

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Eliminar usuarios existentes (opcional, para evitar duplicados)
        User::truncate();

        // Crear usuarios con diferentes roles
        User::create([
            'name' => 'Ronny',
            'email' => 'ronnypallo8@gmail.com',
            'password' => Hash::make('123456789'), // Cambia la contraseña por una segura
            'role_id' => 1, // Asignar el ID del rol Administrador
        ]);

        // Agregar más usuarios si es necesario
        User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('password123'), // Cambia la contraseña por una segura
            'role_id' => 2, // Asignar el ID del rol Editor
        ]);

        User::create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => Hash::make('password123'), // Cambia la contraseña por una segura
            'role_id' => 3, // Asignar el ID del rol Invitado
        ]);


        // Crear usuarios con diferentes roles
        User::create([
            'name' => 'Alejandro',
            'email' => 'portillaai@example.com',
            'password' => Hash::make('Chiwanda2211'), // Cambia la contraseña por una segura
            'role_id' => 1, // Asignar el ID del rol Administrador
        ]);
    }
}
