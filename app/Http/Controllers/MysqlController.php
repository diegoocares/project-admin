<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\Empleado;
use Illuminate\Http\Request;

class MysqlController extends Controller
{
    
    public function obtenerEmpleados(){
        $empleados = Empleado::where('id', 3)->get();
        return $empleados;
    }

    
}
