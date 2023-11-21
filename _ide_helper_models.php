<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property mixed $password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\actividades
 *
 * @property int $id
 * @property string $nombre
 * @property int $id_estado
 * @property string $fecha_realizacion
 * @property string $fecha_finalizacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\empleado_actividad> $empleadoActividad
 * @property-read int|null $empleado_actividad_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\empleados> $empleados
 * @property-read int|null $empleados_count
 * @property-read \App\Models\estados $estados
 * @method static \Illuminate\Database\Eloquent\Builder|actividades newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|actividades newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|actividades query()
 * @method static \Illuminate\Database\Eloquent\Builder|actividades whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|actividades whereFechaFinalizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|actividades whereFechaRealizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|actividades whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|actividades whereIdEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|actividades whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|actividades whereUpdatedAt($value)
 */
	class actividades extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\empleado_actividad
 *
 * @property int $id
 * @property int $id_empleado
 * @property int $id_actividad
 * @property int $id_rol
 * @property string $fecha_adicion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\actividades $actividades
 * @property-read \App\Models\roles $roles
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad query()
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad whereFechaAdicion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad whereIdActividad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad whereIdEmpleado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad whereIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_actividad whereUpdatedAt($value)
 */
	class empleado_actividad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\empleado_especialidad
 *
 * @property int $id
 * @property int $id_empleado
 * @property int $id_especialidad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad whereIdEmpleado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad whereIdEspecialidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleado_especialidad whereUpdatedAt($value)
 */
	class empleado_especialidad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\empleados
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $email
 * @property string $fecha_contratacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\actividades> $actividades
 * @property-read int|null $actividades_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\especialidades> $especialidades
 * @property-read int|null $especialidades_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\roles> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|empleados newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|empleados newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|empleados query()
 * @method static \Illuminate\Database\Eloquent\Builder|empleados whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleados whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleados whereFechaContratacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleados whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleados whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|empleados whereUpdatedAt($value)
 */
	class empleados extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\especialidades
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\empleados> $empleados
 * @property-read int|null $empleados_count
 * @method static \Illuminate\Database\Eloquent\Builder|especialidades newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|especialidades newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|especialidades query()
 * @method static \Illuminate\Database\Eloquent\Builder|especialidades whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|especialidades whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|especialidades whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|especialidades whereUpdatedAt($value)
 */
	class especialidades extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\estados
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|estados newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|estados newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|estados query()
 * @method static \Illuminate\Database\Eloquent\Builder|estados whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|estados whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|estados whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|estados whereUpdatedAt($value)
 */
	class estados extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\roles
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|roles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|roles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|roles query()
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereUpdatedAt($value)
 */
	class roles extends \Eloquent {}
}

