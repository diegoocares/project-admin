@extends('layouts.app')

@section('title', 'Empleado')

@section('content')
    <div class="container mt-5">
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

        <h2>Empleado: {{ $empleado->nombre }}</h2>
        <h5>Especialidades del empleado</h5>

        @if ($empleado->especialidades->count() > 0)
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Especialidades</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleado->especialidades as $especialidad)
                        <tr>
                            <td>{{ $especialidad->id }}</td>
                            <td>{{ $especialidad->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Este empleado no cuenta con ninguna especialidad.</p>
        @endif

        <!-- Tabla para agregar especialidades -->
        <h5>Especialidades disponibles</h5>
        @if ($especialidadesNoAsignadas->count() > 0)
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especialidadesNoAsignadas as $especialidad)
                        <tr>
                            <td>{{ $especialidad->id }}</td>
                            <td>{{ $especialidad->nombre }}</td>
                            <td>
                                <form action="{{ route('agregarEmpleadoEspecialidad') }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id_empleado" value="{{ $empleado->id }}">
                                    <input type="hidden" name="id_especialidad" value="{{ $especialidad->id }}">
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>El empleado cuenta con todas las especialidades registradas.</p>
        @endif
    </div>
@endsection