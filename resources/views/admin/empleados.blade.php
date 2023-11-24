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
        <h2>Empleados</h2>
        
        <a href="{{ route('addEmpleado') }}" class="btn btn-primary mb-3">Nuevo Empleado</a>
        
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
                                <a href="{{ route('updateEmpleado', ['id' => $empleado->id]) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('infoEmpleado', ['id' => $empleado->id]) }}" class="btn btn-info">Info</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay empleados.</p>
        @endif
    </div>
@endsection