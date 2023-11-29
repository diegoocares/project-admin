<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Estado;
use App\Models\Empleado;
use App\Models\Actividad;
use App\Models\Especialidad;
use App\Models\EmpleadoActividad;
use App\Http\Requests\EmpleadoRequest;
use App\Http\Requests\ActividadRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpleadoActividadRequest;
use App\Http\Requests\EmpleadoEspecialidadRequest;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    /* 
        Funciones para el registro y actulización de Actividades
    */

    /**
     * 
     */
    public function showActividades(){

        $actividades = Actividad::with('estados')
            ->get();

        /**
         * $actividades = Actividad::with('estados')
         *   ->select('nombre')
         *   ->get();
         * 
         * función util para revisar la información que llega o se manda en las variables
         * en este caso veerá lo que llega por la variable $actividades
         * 
         * dd($actividades);
         * 
         */
        

        return view('admin.mostrarActividades', ['actividades' => $actividades]);
    }

    public function newActividad(){
        $estados = Estado::all();
        return view('admin.nuevaActividad', ['estados' => $estados]);
    }

    public function addActividad(ActividadRequest $request){
        $actividad = Actividad::create($request->validated());
        return redirect()->route('editarActividad', ['id' => $actividad->id])->with('success', 'Actividad creada exitosamente');
    }


    public function updateActividad($id){
        // Lógica para obtener la actividad por su ID y pasarla al formulario de edición
        $actividad = Actividad::with(['empleados.roles' => function ($query) use ($id) {
            $query->where('id_actividad', $id);
        }])->find($id); 

        // Obtén todos los empleados que no están asignados a esta actividad
        $empleadosNoAsignados = Empleado::whereDoesntHave('actividades', function ($query) use ($id) {
            $query->where('id_actividad', $id);
        })->get();

        // Obtener roles
        $roles = Rol::all();

        // Obtener estados
        $estados = Estado::all();

        return view('admin.editarActividad', ['actividad' => $actividad, 'empleadosNoAsignados' => $empleadosNoAsignados, 'roles' => $roles, 'estados' => $estados]);
    }

    public function updateEstadoActividad(ActividadRequest $request){
        $actividad = Actividad::find($request->input('id_actividad'));

        if (!$actividad){
            return redirect()->back()->with('error', 'Actividad no encontrada');
        }

        $nuevoEstado = $request->input('comboEstado');
        $estadoActual = $actividad->id_estado;

        if ($nuevoEstado == $estadoActual) {
            return redirect()->back()->with('error', 'La actividad ya se encuentra en este estado');
        }

        $actividad->update(['id_estado' => $request->input('comboEstado')]);
        return redirect()->back()->with('success', 'El estado de la actividad ha sido actualizado correctamente');
    }

    public function deleteEmpleadoActividad($id_empleado, $id_actividad){
        $empleado = Empleado::find($id_empleado);

        if($empleado){
            $empleado->actividades()->detach($id_actividad);
            return Redirect::back()->with('success', 'Empleado eliminado de la actividad exitosamente');
        }

        return Redirect::back()->with('error', 'No se pudo encontrar al empleado');
    }
    public function addEmpleadoActividad(EmpleadoActividadRequest $request){

        $empleado = Empleado::find($request->input('id_empleado'));

        if (!$empleado){
            return redirect()->back()->with('error', 'El empleado ya está asignado a esta actividad');
        }

        $empleado->actividades()->attach($request->input('id_actividad'), ['id_rol' => $request->input('id_rol'), 'fecha_adicion' => now()]);
        return redirect()->back()->with('success', 'Empleado agregado exitosamente a la actividad');
    }

    /*
        Funciones para el registro y actualización de Empleados
    */

    public function showEmpleados(){
        $empleados = Empleado::all();
        return view('admin.empleados', ['empleados' => $empleados]);
    }

    public function newEmpleado(){
        return view('admin.addEmpleado');
    }

    public function infoEmpleadoById($id){
        $empleado = Empleado::with('especialidades')->find($id);

        // Obtén las especialidad no asignadas al Empleado
        $especialidadesNoAsignadas = Especialidad::whereDoesntHave('empleados', function ($query) use ($id) {
            $query->where('id_empleado', $id);
        })->get();

        return view('admin.infoEmpleado', ['empleado' => $empleado, 'especialidadesNoAsignadas' => $especialidadesNoAsignadas]);
    }

    public function addEmpleado(EmpleadoRequest $request){
        Empleado::create($request->validated());

        return Redirect::route('showEmpleados');
    }

    public function updateEmpleado($id){
        $empleado = Empleado::find($id);
        return view('admin.updateEmpleado', ['empleado' => $empleado]);
    }

    public function saveUpdateEmpleado(EmpleadoRequest $request, $id){
        $empleado = Empleado::find($id);

        $empleado->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'fecha_contratacion' => $request->input('fecha_contratacion'),
        ]);

        return Redirect::route('showEmpleados')->with('success', 'Empleado actualizado correctamente');
    }

    public function addEmpleadoEspecialidad(EmpleadoEspecialidadRequest $request){

        $empleado = Empleado::find($request->input('id_empleado'));

        if (!$empleado){
            return redirect()->back()->with('error', 'Empleado no encontrado');
        }

        $empleado->especialidades()->sync([$request->input('id_especialidad')], false);

        return redirect()->back()->with('success', 'Especialidad agregada exitosamente al empleado');
    }
}
