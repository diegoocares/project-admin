<?php
namespace App\Services;

use App\Models\Rol;

class RolService
{

    public function getAll()
    {
        return Rol::all();
    }
    // Otros métodos para actualizar, obtener, eliminar, etc.
}