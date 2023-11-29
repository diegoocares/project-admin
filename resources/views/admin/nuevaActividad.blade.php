@extends('layouts.app')

@section('title', 'Nueva Actividad')

@section('content')
    <div class="container mt-5">
        <h2>Nueva Actividad</h2>

        <form action="{{ route('guardarActividad') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la Actividad</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="id_estado" name="id_estado" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_realizacion">Fecha de Realización</label>
                <input type="date" class="form-control" id="fecha_realizacion" name="fecha_realizacion" required>
            </div>

            <div class="form-group">
                <label for="fecha_finalizacion">Fecha de Finalización</label>
                <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Actividad</button>
        </form>
    </div>
@endsection
