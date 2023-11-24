@extends('layouts.app')

@section('title', 'Actividad')

@section('content')
    <div class="container mt-5">
        <h2>Actividad: {{ $actividad->nombre }}</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h5>Empleados asignados</h5>

        @if ($actividad->empleados->count() > 0)
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actividad->empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>
                                @if($empleado->roles->count() > 0)
                                    @foreach ($empleado->roles as $rol)
                                        {{ $rol->nombre }}
                                    @endforeach
                                @else
                                    Sin rol asignado
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('infoEmpleado', ['id' => $empleado->id]) }}" class="btn btn-info">Info</a>
                                <a href="{{ route('eliminarEmpleadoActividad', ['id_empleado' => $empleado->id, 'id_actividad' => $actividad->id]) }}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        @else
            <p>No hay empleados asignados a esta actividad.</p>
        @endif
        <!-- Tabla para agregar empleados -->
        <h5>Empleados no asignados</h5>
        @if ($empleadosNoAsignados->count() > 0)
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleadosNoAsignados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>
                                <form action="{{ route('agregarEmpleadoActividad') }}" method="post">
                                    @csrf
                                    <select name="id_rol">
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="id_empleado" value="{{ $empleado->id }}">
                                    <input type="hidden" name="id_actividad" value="{{ $actividad->id }}">
                                    <a href="{{ route('infoEmpleado', ['id' => $empleado->id]) }}" class="btn btn-info">Info</a>
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Todos los empleados están asignados a esta actividad.</p>
        @endif
        
    </div>
    <a href="{{ route('mostrarActividades') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection