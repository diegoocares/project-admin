@extends('layouts.app')

@section('title', 'Nuevo Empleado')

@section('content')
    <div class="container mt-5">
        <h2>Nuevo Empleado</h2>

        <form action="{{ route('saveEmpleado') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre del Empleado</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="fecha_contratacion">Fecha de Contratación</label>
                <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Empleado</button>
        </form>
    </div>
@endsection