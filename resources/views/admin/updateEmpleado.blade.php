@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <div class="container mt-5">
        <h2>Editar Empleado {{$empleado->nombre}}</h2>

        <form action="{{ route('saveUpdateEmpleado', ['id' => $empleado->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">ID del Empleado</label>
                <input type="text" class="form-control" id="id" name="id" value="{{$empleado->id}}" required disabled>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre del Empleado</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$empleado->nombre}}" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$empleado->email}}" required>
            </div>

            <div class="form-group">
                <label for="fecha_contratacion">Fecha de Contratación</label>
                <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" value="{{$empleado->fecha_contratacion}}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
        </form>
    </div>
@endsection