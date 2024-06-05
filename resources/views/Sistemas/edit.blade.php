@extends('layouts.app')

@section('content')
<style>
    /* Estilos para la página de editar alumno */
    body {
        background: url('{{ asset('images/fondo.gif') }}') no-repeat center center fixed;
        background-size: cover;
        backdrop-filter: blur(0.5px);
        font-family: Arial, sans-serif;
        color: #ecf0f1;
    }

    .container {
        padding: 20px;
        border-radius: 10px;
        background-color: rgba(75, 0, 130, 0.8);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        color: #ecf0f1;
    }

    h1 {
        margin-bottom: 20px;
        color: #ecf0f1;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-control {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #7f8c8d;
        margin-bottom: 10px;
        background-color: rgba(255, 255, 255, 0.2);
        color: #ecf0f1;
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        color: white;
        text-decoration: none;
        transition: opacity 0.3s;
    }

    .btn-primary:hover {
        opacity: 0.9;
    }
</style>

<div class="container">
    <h1>Editar Alumno</h1>
    <form method="POST" action="{{ route('Sistemas.update', $student->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
        </div>
        <div class="form-group">
            <label for="age">Edad:</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $student->age }}" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
        </div>
        <div class="form-group">
            <label for="major">Carrera:</label>
            <input type="text" name="major" id="major" class="form-control" value="{{ $student->major }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
