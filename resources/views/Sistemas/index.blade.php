@extends('layouts.app')

@section('content')
<style>
    /* Estilos para la página de lista de alumnos */
    body {
        background: url('{{ asset('images/fondo2.gif') }}') no-repeat center center fixed;
        background-size: cover;
        backdrop-filter: blur(0.5px);
        font-family: Arial, sans-serif;
        color: #ecf0f1; /* Texto claro */
    }

    .container {
        padding: 20px;
        border-radius: 10px;
        background-color: rgba(76, 0, 130, 0.878); /* Fondo morado oscuro con opacidad */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
        color: #ecf0f1;
    }

    h1 {
        margin-bottom: 20px;
        color: #ecf0f1;
    }

    a {
        color: #3498db;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        color: #ecf0f1;
    }

    th, td {
        padding: 10px;
        border: 1px solid #7f8c8d;
    }

    th {
        background-color: #2c3e50;
        color: #ecf0f1;
    }

    /* Estilos para los botones */
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        color: white;
        text-decoration: none;
    }

    .btn-primary {
        background-color: #3498db;
        margin-bottom: 20px;
    }

    .btn-warning {
        background-color: #9b59b6; /* Color morado más claro */
    }

    .btn-danger {
        background-color: #e74c3c;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>

<div class="container">
    <h1>Lista de Alumnos</h1>
    <a href="{{ route('Sistemas.create') }}" class="btn btn-primary">Agregar Nuevo Alumno</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->major }}</td>
                <td>
                    <a href="{{ route('Sistemas.edit', $student->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('Sistemas.destroy', $student->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este alumno?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
