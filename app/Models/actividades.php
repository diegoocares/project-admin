<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['nombre', 'id_estado', 'fecha_realizacion', 'fecha_finalizacion'];
    use HasFactory;

    // Definir la relación con la tabla estados
    public function estados(){
        return $this->belongsTo(estados::class, 'id_estado');
    }

    // Definir la relación con la tabla pivot empleado_actividad
    public function empleadoActividad(){
        return $this->hasMany(empleado_actividad::class);
    }

    // Definir la relación con empleados a través de la tabla pivot
    public function empleados(){
        return $this->belongsToMany(empleados::class, 'empleado_actividad', 'id_actividad', 'id_empleado');
    }
}
