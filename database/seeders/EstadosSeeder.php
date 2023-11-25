<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Estado::create(['nombre' => 'En Progreso']);
        Estado::create(['nombre' => 'Completado']);
        Estado::create(['nombre' => 'Pendiente']);
    }
}
