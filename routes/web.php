<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

Route::prefix('administracion')->group(function () {

    //Actividades
    
    Route::get('/actividades', [AdminController::class, 'showActividades'])->name('mostrarActividades');
    
    Route::get('/addActividad', [AdminController::class, 'newActividad'])->name('nuevaActividad');

    Route::post('/guardarActividad', [AdminController::class, 'addActividad'])->name('guardarActividad');
    
    Route::get('/editarActividad/{id}', [AdminController::class, 'updateActividad'])->name('editarActividad');
    
    Route::post('/eliminarEmpleadoActividad/empe{id_empleado}acti{id_actividad}', [AdminController::class, 'deleteEmpleadoActividad'])->name('eliminarEmpleadoActividad');
    
    Route::post('/agregarEmpleadoActividad', [AdminController::class, 'addEmpleadoActividad'])->name('agregarEmpleadoActividad');

    Route::post('/editarEstadoActividad', [AdminController::class, 'updateEstadoActividad'])->name('editarEstadoActividad');

    //Empleados

    Route::get('/empleados', [AdminController::class, 'showEmpleados'])->name('showEmpleados');

    Route::get('/addEmpleado', [AdminController::class, 'newEmpleado'])->name('addEmpleado');

    Route::post('/saveEmpleado', [AdminController::class, 'addEmpleado'])->name('saveEmpleado');

    Route::get('/updateEmpleado/{id}', [AdminController::class, 'updateEmpleado'])->name('updateEmpleado');

    Route::post('/saveUpdateEmpleado/{id}', [AdminController::class, 'saveUpdateEmpleado'])->name('saveUpdateEmpleado');

    Route::get('/infoEmpleado/{id}', [AdminController::class, 'infoEmpleadoById'])->name('infoEmpleado');

    Route::post('/agregarEmpleadoEspecialidad', [AdminController::class, 'addEmpleadoEspecialidad'])->name('agregarEmpleadoEspecialidad');

    
});


