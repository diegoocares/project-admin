<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Estado;
use App\Models\Empleado;
use App\Models\Actividad;
use App\Models\Especialidad;
use App\Models\EmpleadoActividad;
use App\Models\EmpleadoEspecialidad;
use App\Http\Requests\EmpleadoRequest;
use App\Http\Requests\ActividadRequest;
use Illuminate\Database\QueryException;
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
        // Crea una nueva instancia de la actividad
        $actividad = new Actividad([
            'nombre' => $request->input('nombre'),
            'id_estado' => $request->input('estado'),
            'fecha_realizacion' => $request->input('fecha_realizacion'),
            'fecha_finalizacion' => $request->input('fecha_finalizacion'),
        ]);

        // Guarda la actividad en la base de datos
        $actividad->save();

        // Redirige al usuario a la página de editar la actividad recién creada
        return Redirect::route('editarActividad', ['id' => $actividad->id])->with('success', 'Actividad creada exitosamente');
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
        $id_estado = $request->input('comboEstado');
        $id_actividad = $request->input('id_actividad');
        $estado_actual = Actividad::find($id_actividad)->id_estado;

        if ($estado_actual == $id_estado) {
            return redirect()->back()->with('error', 'La actividad ya se encuentra en este estado');
        }

        Actividad::where('id', $id_actividad)->update(['id_estado' => $id_estado]);

        return redirect()->back()->with('success', 'El estado de la actividad ha sido actualizado correctamente');
    }

    public function deleteEmpleadoActividad($id_empleado, $id_actividad){
        // Encuentra la relación empleado_actividad por los IDs proporcionados
        $relacion = EmpleadoActividad::where('id_empleado', $id_empleado)->where('id_actividad', $id_actividad);
        
        if($relacion){
            // Elimina la relación
            $relacion->delete();
            
            return Redirect::back()->with('success', 'Empleado eliminado de la actividad exitosamente');
        } else {
            // No se encontró la relación
            return Redirect::back()->with('error', 'No se pudo encontrar la relación empleado-actividad');
        }
    }

    public function addEmpleadoActividad(EmpleadoActividadRequest $request){
        $id_empleado = $request->input('id_empleado');
        $id_actividad = $request->input('id_actividad');
        $id_rol = $request->input('id_rol');
    
        // Verifica si ya existe una relación para evitar duplicados
        $relacionExistente = EmpleadoActividad::where('id_empleado', $id_empleado)
            ->where('id_actividad', $id_actividad)
            ->exists();
    
        if (!$relacionExistente) {
            // Crea una nueva relación en la tabla pivot
            EmpleadoActividad::create([
                'id_empleado' => $id_empleado,
                'id_actividad' => $id_actividad,
                'id_rol' => $id_rol,
                'fecha_adicion' => now(), // Puedes ajustar esto según tus necesidades
            ]);
    
            return redirect()->back()->with('success', 'Empleado agregado exitosamente a la actividad');
        }
    
        return redirect()->back()->with('error', 'El empleado ya está asignado a esta actividad');
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
        $empleado = new Empleado([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'fecha_contratacion' => $request->input('fecha_contratacion'),
        ]);

        $empleado->save();

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
        $id_empleado = $request->input('id_empleado');
        $id_especialidad = $request->input('id_especialidad');

        try{
            // Intenta encontrar la relación existente o crear una nueva
            EmpleadoEspecialidad::firstOrCreate([
                'id_empleado' => $id_empleado,
                'id_especialidad' => $id_especialidad
            ]);
    
            return redirect()->back()->with('success', 'Especialidad agregada exitosamente al empleado');
    
        } catch (QueryException $e){
            return redirect()->back()->with('error', 'La especialidad ya se encuentra asignada al empleado');
        }
        
    }
}
