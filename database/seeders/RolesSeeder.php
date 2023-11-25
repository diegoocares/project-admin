<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Rol::create(['nombre' => 'Desarrollador', 'descripcion' => 'Encargado de escribir y mantener código']);
        Rol::create(['nombre' => 'Tester/QA', 'descripcion' => 'Responsable de realizar pruebas de calidad']);
        Rol::create(['nombre' => 'Encargado de Proyecto', 'descripcion' => 'Responsable de la gestión general del proyecto']);
    }
}
