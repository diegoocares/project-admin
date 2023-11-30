<?php
namespace App\Services;

use App\Models\Estado;

class EstadoService
{

    public function getAll()
    {
        return Estado::all();
    }
    // Otros métodos para actualizar, obtener, eliminar, etc.
}