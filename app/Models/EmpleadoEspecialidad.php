<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoEspecialidad extends Model
{
    protected $table = 'empleado_especialidad';
    protected $fillable = ['id_empleado', 'id_especialidad'];
    use HasFactory;
}
