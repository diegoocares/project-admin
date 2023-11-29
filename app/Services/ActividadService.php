<?php
namespace App\Services;

use App\Models\Actividad;
use App\Http\Requests\ActividadRequest;

class ActividadService
{
    public function create(ActividadRequest $request)
    {
        return Actividad::create($request->validated());
    }

    // Otros métodos para actualizar, obtener, eliminar, etc.
}