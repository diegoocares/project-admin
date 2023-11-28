<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['nombre', 'id_estado', 'fecha_realizacion', 'fecha_finalizacion'];
    use HasFactory;

    // Definir la relación con la tabla estados
    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    // Definir la relación con la tabla pivot empleado_actividad
    public function empleadoActividad(){
        return $this->hasMany(EmpleadoActividad::class);
    }

    // Definir la relación con empleados a través de la tabla pivot
    public function empleados(){
        return $this->belongsToMany(Empleado::class, 'empleado_actividad', 'id_actividad', 'id_empleado');
    }
}
