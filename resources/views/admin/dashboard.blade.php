@extends('layouts.app')

@section('title', 'Dashboard') <!-- Título específico para esta página -->

@section('content')
    
    <p>Bienvenido al dashboard de administración.</p>
    <a href="{{ route('mostrarActividades') }}">Ver Actividades</a>
    <!-- Más contenido específico del dashboard -->
@endsection