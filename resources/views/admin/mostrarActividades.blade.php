@extends('layouts.app')

@section('title', 'Actividades')

@section('content')
    <div class="container mt-5">
        <h2>Lista de Actividades</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('nuevaActividad') }}" class="btn btn-primary mb-3">Nueva Actividad</a>
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Fecha de realización</th>
                    <th>Fecha de finalización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->id }}</td>
                        <td>{{ $actividad->nombre }}</td>
                        <td>{{ $actividad->estados->nombre }}</td>
                        <td>{{ $actividad->fecha_realizacion }}</td>
                        <td>{{ $actividad->fecha_finalizacion }}</td>
                        <td>
                            <a href="{{ route('editarActividad', ['id' => $actividad->id]) }}" class="btn btn-info">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
