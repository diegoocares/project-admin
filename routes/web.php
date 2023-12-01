<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

Route::prefix('administracion')->group(function () {

    //Actividades
    
    Route::get('/actividades', [AdminController::class, 'showActividades'])->name('mostrarActividades');
    
    Route::get('/addActividad', [AdminController::class, 'newActividad'])->name('nuevaActividad');

    Route::post('/guardarActividad', [AdminController::class, 'addActividad'])->name('guardarActividad');
    
    Route::get('/editarActividad/{id}', [AdminController::class, 'editActividad'])->name('editarActividad');
    
    Route::delete('/eliminarEmpleadoActividad/empe{id_empleado}acti{id_actividad}', [AdminController::class, 'deleteEmpleadoActividad'])->name('eliminarEmpleadoActividad');
    
    Route::post('/agregarEmpleadoActividad', [AdminController::class, 'addEmpleadoActividad'])->name('agregarEmpleadoActividad');

    Route::match(['post', 'patch'] ,'/editarEstadoActividad', [AdminController::class, 'updateEstadoActividad'])->name('editarEstadoActividad');

    //Empleados

    Route::get('/empleados', [AdminController::class, 'showEmpleados'])->name('showEmpleados');

    Route::get('/addEmpleado', [AdminController::class, 'newEmpleado'])->name('addEmpleado');

    Route::post('/saveEmpleado', [AdminController::class, 'addEmpleado'])->name('saveEmpleado');

    Route::get('/editEmpleado/{id}', [AdminController::class, 'editEmpleado'])->name('editEmpleado');

    Route::match(['post', 'patch'] ,'/UpdateEmpleado/{id}', [AdminController::class, 'UpdateEmpleado'])->name('UpdateEmpleado');

    Route::get('/infoEmpleado/{id}', [AdminController::class, 'infoEmpleadoById'])->name('infoEmpleado');

    Route::match(['post', 'patch'] ,'/agregarEmpleadoEspecialidad', [AdminController::class, 'addEmpleadoEspecialidad'])->name('agregarEmpleadoEspecialidad');

    
});


