@extends('layouts.app')

@section('title', 'Empleados')

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
        <h5>Empleados</h5>

        @if ($empleados->count() > 0)
            <table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>
                                <a href="{{ route('infoEmpleado', ['id' => $empleado->id]) }}" class="btn btn-info">Info</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        @else
            <p>No hay empleados asignados a esta actividad.</p>
        @endif
    </div>

@endsection