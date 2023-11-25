<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['nombre', 'email', 'fecha_contratacion'];
    use HasFactory;

    // Definir la relación muchos a muchos con especialidades
    public function especialidades(){
        return $this->belongsToMany(Especialidades::class, 'empleado_especialidad', 'id_empleado', 'id_especialidad');
    }

    // Definir la relación muchos a muchos con actividades
    public function actividades(){
        return $this->belongsToMany(Actividad::class, 'empleado_actividad', 'id_empleado', 'id_actividad');
    }

    // Definir la relación muchos a muchos con roles
    public function roles(){
        return $this->belongsToMany(roles::class, 'empleado_actividad', 'id_empleado', 'id_rol');
    }
}
