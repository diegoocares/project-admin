<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Especialidad::create(['nombre' => 'Desarrollo Web']);
        Especialidad::create(['nombre' => 'QA/Testing']);
        Especialidad::create(['nombre' => 'Gestión de Proyectos']);
    }
}
