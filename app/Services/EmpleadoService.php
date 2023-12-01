<?php
namespace App\Services;

use App\Http\Requests\EmpleadoActividadRequest;
use App\Http\Requests\EmpleadoRequest;
use App\Http\Requests\EmpleadoEspecialidadRequest;
use App\Models\Especialidad;
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

    public function create(EmpleadoRequest $request)
    {
        return Empleado::create($request->validated());
    }

    public function update(Empleado $empleado, EmpleadoRequest $request)
    {
        $empleado->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'fecha_contratacion' => $request->input('fecha_contratacion'),
        ]);
    }

    public function addEspecialidad(Empleado $empleado, EmpleadoEspecialidadRequest $request)
    {
        $empleado->especialidades()->sync([$request->input('id_especialidad')], false);
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

    public function getEspecialidadesNoAsignadas($id_empleado)
    {
        return Especialidad::whereDoesntHave('empleados', function ($query) use ($id_empleado) {
            $query->where('id_empleado', $id_empleado);
        })->get();
    }
    // Otros métodos para actualizar, obtener, eliminar, etc.
}