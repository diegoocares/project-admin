<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleado_actividad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('id_rol');
            $table->date('fecha_adicion');
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->foreign('id_actividad')->references('id')->on('actividades');
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_actividad');
    }
};
