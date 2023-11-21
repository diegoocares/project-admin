<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado_actividad extends Model
{
    protected $table = 'empleado_actividad';
    protected $fillable = ['id_empleado', 'id_actividad', 'id_rol', 'fecha_adicion'];
    use HasFactory;

    // Definir la relación con la tabla actividades
    public function actividades(){
        return $this->belongsTo(actividades::class, 'id_actividad');
    }

    // Definir la relación con la tabla actividades
    public function roles(){
        return $this->belongsTo(roles::class, 'id_rol');
    }
}
