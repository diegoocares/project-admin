<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\empleados;
use App\Models\estados;
use App\Models\empleado_actividad;
use App\Models\roles;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    /* 
        Funciones para el registro y actulización de Actividades
    */


    public function mostrarActividades(){
        $actividades = Actividad::with('estados')->get();
    
        return view('admin.mostrarActividades', ['actividades' => $actividades]);
    }

    public function nuevaActividad(){
        $estados = estados::all();
        return view('admin.nuevaActividad', ['estados' => $estados]);
    }

    public function addActividad(Request $request){
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


    public function editarActividad($id){
        // Lógica para obtener la actividad por su ID y pasarla al formulario de edición
        $actividad = Actividad::with(['empleados.roles' => function ($query) use ($id) {
            $query->where('id_actividad', $id);
        }])->find($id);

        // Obtén todos los empleados que no están asignados a esta actividad
        $empleadosNoAsignados = empleados::whereDoesntHave('actividades', function ($query) use ($id) {
            $query->where('id_actividad', $id);
        })->get();

        // Obtener roles
        $roles = roles::all();

        return view('admin.editarActividad', ['actividad' => $actividad, 'empleadosNoAsignados' => $empleadosNoAsignados, 'roles' => $roles]);
    }

    public function infoEmpleadoById($id){
        $empleado = empleados::with('especialidades')->find($id);
        return view('admin.infoEmpleado', ['empleado' => $empleado]);
    }

    public function deleteEmpleadoActividad($id_empleado, $id_actividad){
        // Encuentra la relación empleado_actividad por los IDs proporcionados
        $relacion = empleado_actividad::where('id_empleado', $id_empleado)->where('id_actividad', $id_actividad);
        
        if($relacion){
            // Elimina la relación
            $relacion->delete();
            
            return Redirect::back()->with('success', 'Empleado eliminado de la actividad exitosamente');
        } else {
            // No se encontró la relación
            return Redirect::back()->with('error', 'No se pudo encontrar la relación empleado-actividad');
        }
    }

    public function addEmpleadoActividad(Request $request){
        $id_empleado = $request->input('id_empleado');
        $id_actividad = $request->input('id_actividad');
        $id_rol = $request->input('id_rol');
    
        // Verifica si ya existe una relación para evitar duplicados
        $relacionExistente = empleado_actividad::where('id_empleado', $id_empleado)
            ->where('id_actividad', $id_actividad)
            ->exists();
    
        if (!$relacionExistente) {
            // Crea una nueva relación en la tabla pivot
            empleado_actividad::create([
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
        $empleados = empleados::all();
        return view('admin.empleados', ['empleados' => $empleados]);
    }

    public function newEmpleado(){
        return view('admin.addEmpleado');
    }

    public function addEmpleado(Request $request){
        $empleado = new empleados([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'fecha_contratacion' => $request->input('fecha_contratacion'),
        ]);

        $empleado->save();

        return Redirect::route('showEmpleados');
    }

    public function updateEmpleado($id){
        $empleado = empleados::find($id);
        return view('admin.updateEmpleado', ['empleado' => $empleado]);
    }

    public function saveUpdateEmpleado(Request $request, $id){
        $empleado = empleados::find($id);

        $empleado->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'fecha_contratacion' => $request->input('fecha_contratacion'),
        ]);

        return Redirect::route('showEmpleados')->with('success', 'Empleado actualizado correctamente');
    }
}
