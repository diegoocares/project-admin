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
 * App\Models\Actividad
 *
 * @property int $id
 * @property string $nombre
 * @property int $id_estado
 * @property string $fecha_realizacion
 * @property string $fecha_finalizacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EmpleadoActividad> $empleadoActividad
 * @property-read int|null $empleado_actividad_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Empleado> $empleados
 * @property-read int|null $empleados_count
 * @property-read \App\Models\Estado $estados
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad whereFechaFinalizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad whereFechaRealizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad whereIdEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actividad whereUpdatedAt($value)
 */
	class Actividad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Empleado
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $email
 * @property string $fecha_contratacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Actividad> $actividades
 * @property-read int|null $actividades_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Especialidad> $especialidades
 * @property-read int|null $especialidades_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Rol> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereFechaContratacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empleado whereUpdatedAt($value)
 */
	class Empleado extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpleadoActividad
 *
 * @property int $id
 * @property int $id_empleado
 * @property int $id_actividad
 * @property int $id_rol
 * @property string $fecha_adicion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Actividad $actividades
 * @property-read \App\Models\Rol $roles
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad whereFechaAdicion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad whereIdActividad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad whereIdEmpleado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad whereIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoActividad whereUpdatedAt($value)
 */
	class EmpleadoActividad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmpleadoEspecialidad
 *
 * @property int $id
 * @property int $id_empleado
 * @property int $id_especialidad
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad whereIdEmpleado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad whereIdEspecialidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmpleadoEspecialidad whereUpdatedAt($value)
 */
	class EmpleadoEspecialidad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Especialidad
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Empleado> $empleados
 * @property-read int|null $empleados_count
 * @method static \Illuminate\Database\Eloquent\Builder|Especialidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Especialidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Especialidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Especialidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Especialidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Especialidad whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Especialidad whereUpdatedAt($value)
 */
	class Especialidad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Estado
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Estado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereUpdatedAt($value)
 */
	class Estado extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rol
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereUpdatedAt($value)
 */
	class Rol extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 */
	class Status extends \Eloquent {}
}

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

