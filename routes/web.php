<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/control',[AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/empleados', [AdminController::class, 'obtenerEmpleados'])->name('obtenerEmpleados');

Route::get('/actividades', [AdminController::class, 'mostrarActividades'])->name('mostrarActividades');

Route::get('/addActividad', [AdminController::class, 'nuevaActividad'])->name('nuevaActividad');
Route::post('/guardarActividad', [AdminController::class, 'addActividad'])->name('guardarActividad');

Route::get('/editarActividad/{id}', [AdminController::class, 'editarActividad'])->name('editarActividad');

Route::get('/infoEmpleado/{id}', [AdminController::class, 'infoEmpleadoById'])->name('infoEmpleado');

Route::get('/eliminarEmpleadoActividad/{id_empleado}-{id_actividad}', [AdminController::class, 'deleteEmpleadoActividad'])->name('eliminarEmpleadoActividad');

Route::post('/agregarEmpleadoActividad', [AdminController::class, 'addEmpleadoActividad'])->name('agregarEmpleadoActividad');
