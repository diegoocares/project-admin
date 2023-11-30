<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Estado;
use App\Models\Empleado;
use App\Models\Actividad;
use App\Models\Especialidad;
use App\Models\EmpleadoActividad;
use App\Services\ActividadService;
use App\Services\EmpleadoService;
use App\Http\Requests\EmpleadoRequest;
use App\Http\Requests\ActividadRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpleadoActividadRequest;
use App\Http\Requests\EmpleadoEspecialidadRequest;
use App\Services\EstadoService;
use App\Services\RolService;

class AdminController extends Controller
{

    protected $actividadService;
    protected $rolService;
    protected $estadoService;
    protected $empleadoService;

    public function __construct(ActividadService $actividadService, RolService $rolService, EstadoService $estadoService, EmpleadoService $empleadoService)
    {
        $this->actividadService = $actividadService;
        $this->rolService = $rolService;
        $this->estadoService = $estadoService;
        $this->empleadoService = $empleadoService;
    }

    public function index(){
        return view('admin.dashboard');
    }

    /* 
        Funciones para el registro y actulización de Actividades
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
        $actividad = $this->actividadService->create($request);
        return redirect()->route('editarActividad', ['id' => $actividad->id])->with('success', 'Actividad creada exitosamente');
    }

    public function editActividad($id){
        $actividad = $this->actividadService->getEmpleadosActividadById($id);

        $unassignedEmpleados = $this->actividadService->getUnassignedEmpleados($id);

        $roles = $this->rolService->getAll();

        $estados = $this->estadoService->getAll();

        return view('admin.editarActividad', ['actividad' => $actividad, 'empleadosNoAsignados' => $unassignedEmpleados, 'roles' => $roles, 'estados' => $estados]);
    }

    public function updateEstadoActividad(ActividadRequest $request){
        $actividad = $this->actividadService->findId($request->input('id_actividad'));

        if (!$actividad){
            return redirect()->back()->with('error', 'Actividad no encontrada');
        }

        $nuevoEstado = $request->input('comboEstado');

        if ($this->actividadService->updateActividadEstado($actividad, $nuevoEstado)) {
            return redirect()->back()->with('success', 'El estado de la actividad ha sido actualizado correctamente');
        }

        return redirect()->back()->with('error', 'La actividad ya se encuentra en este estado');
    }

    public function deleteEmpleadoActividad($id_empleado, $id_actividad){
        $empleado = $this->empleadoService->findId($id_empleado);

        if($empleado){
            $this->empleadoService->deleteEmpleadoActividad($empleado, $id_actividad);
            return Redirect::back()->with('success', 'Empleado eliminado de la actividad exitosamente');
        }

        return Redirect::back()->with('error', 'No se pudo encontrar al empleado');
    }

    public function addEmpleadoActividad(EmpleadoActividadRequest $request){

        $empleado = Empleado::find($request->input('id_empleado'));

        if (!$empleado){
            return redirect()->back()->with('error', 'El empleado ya está asignado a esta actividad');
        }

        $this->empleadoService->addEmpleadoActividad($empleado, $request);
        
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
