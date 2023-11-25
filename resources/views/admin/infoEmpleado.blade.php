@extends('layouts.app')

@section('title', 'Empleado')

@section('content')
    <div class="container mt-5">
        <h2>Actividad: {{ $empleado->nombre }}</h2>
        <h5>Especialidades</h5>

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
    </div>
@endsection