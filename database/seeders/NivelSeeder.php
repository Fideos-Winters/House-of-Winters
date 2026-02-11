<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleados')->insert([
            'Nombres'    => 'Juan',
            'Apellidos'  => 'Perez',
            'Correo'     => 'juan.perez@example.com',
            'Contrasena' => '123456',
            'Rol'        => 'cajero',
            'Imagen'     => 'juan.jpg',
            'Estado'     => 'activo',
        ]);

        DB::table('empleados')->insert([
            'Nombres'    => 'María',
            'Apellidos'  => 'López',
            'Correo'     => 'maria.lopez@example.com',
            'Contrasena' => '654321',
            'Rol'        => 'barista',
            'Imagen'     => 'maria.jpg',
            'Estado'     => 'inactivo',
        ]);
    }
}