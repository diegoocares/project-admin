<?php
namespace App\Services;

use App\Models\Actividad;
use App\Http\Requests\ActividadRequest;
use App\Models\Empleado;

class ActividadService
{
    public function getAll()
    {
        return Actividad::all();
    }

    public function findId($id_actividad)
    {
        return Actividad::find($id_actividad);
    }

    public function create(ActividadRequest $request)
    {
        return Actividad::create($request->validated());
    }

    public function getEmpleadosActividadById($id_actividad)
    {
        return Actividad::with(['empleados.roles' => function ($query) use ($id_actividad) {
            $query->where('id_actividad', $id_actividad);
        }])->find($id_actividad); 
    }

    public function getUnassignedEmpleados($id_actividad)
    {
        $assignedEmpleadosIds = Actividad::find($id_actividad)->empleados->pluck('id')->toArray();
        return Empleado::whereNotIn('id', $assignedEmpleadosIds)->get();
    }

    public function updateActividadEstado(Actividad $actividad, $nuevoEstado): bool
    {
        $estadoActual = $actividad->id_estado;

        if ($nuevoEstado == $estadoActual){
            return false;
        }

        $actividad->update(['id_estado' => $nuevoEstado]);
        
        return true;
    }

    // Otros métodos para actualizar, obtener, eliminar, etc.
}