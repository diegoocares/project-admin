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
        Schema::create('empleado_especialidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_especialidad');
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->foreign('id_especialidad')->references('id')->on('especialidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_especialidad');
    }
};
