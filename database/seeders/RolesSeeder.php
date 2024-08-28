<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Insertar roles predeterminados
        DB::table('roles')->updateOrInsert(
            ['name' => 'Administrador']
        );

        DB::table('roles')->updateOrInsert(
            ['name' => 'Editor']
        );

        DB::table('roles')->updateOrInsert(
            ['name' => 'Invitado']
        );
    }
}
