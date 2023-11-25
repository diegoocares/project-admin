<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    protected $fillable = ['nombre'];
    use HasFactory;

    // Definir la relación muchos a muchos con empleados
    public function empleados(){
        return $this->belongsToMany(Empleado::class, 'empleado_especialidad', 'id_especialidad', 'id_empleado');
    }
}
