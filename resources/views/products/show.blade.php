@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Alumno</h1>
    <p><strong>Nombre:</strong> {{ $student->name }}</p>
    <p><strong>Edad:</strong> {{ $student->age }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $student->email }}</p>
    <p><strong>Carrera:</strong> {{ $student->major }}</p>
    <a href="{{ route('Sistemas.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@endsection
