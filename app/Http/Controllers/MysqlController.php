<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\empleados;
use Illuminate\Http\Request;

class MysqlController extends Controller
{
    
    public function obtenerEmpleados(){
        $empleados = empleados::where('id', 3)->get();
        return $empleados;
    }

    
}
