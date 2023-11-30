<?php
namespace App\Services;

use App\Http\Requests\EmpleadoActividadRequest;
use App\Models\Empleado;

class EmpleadoService
{

    public function getAll()
    {
        return Empleado::all();
    }

    public function findId($id_empleado)
    {
        return Empleado::find($id_empleado);
    }

    public function addEmpleadoActividad(Empleado $empleado, EmpleadoActividadRequest $request)
    {
        $empleado->actividades()->attach(
            $request->input('id_actividad'),
            [
                'id_rol' => $request->input('id_rol'),
                'fecha_adicion' => now()
            ]
        );
    }

    public function deleteEmpleadoActividad(Empleado $empleado, $id_actividad)
    {
        $empleado->actividades()->detach($id_actividad);
    }
    // Otros métodos para actualizar, obtener, eliminar, etc.
}