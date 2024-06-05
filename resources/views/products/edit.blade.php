@extends('layouts.app')

@section('content')
<style>
/* Estilos específicos para la vista */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    color: #ecf0f1; /* Texto claro */
    background: url('{{ asset('images/fondo.gif') }}') no-repeat center center fixed; /* Fondo GIF */
    background-size: cover; /* Asegura que el GIF cubra toda la pantalla */
    backdrop-filter: blur(0.5px); /* Desenfoque */
}

.container {
    width: 50%; /* Ancho del contenedor */
    margin: 20px auto; /* Centra el contenedor */
    padding: 20px; /* Espaciado interno */
    border-radius: 8px;
    background-color: rgba(52, 73, 94, 0.8); /* Fondo oscuro con opacidad */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
}

h1 {
    color: #ecf0f1; /* Texto claro */
    margin-bottom: 20px;
    text-align: center; /* Centra el título */
}

/* Estilos para el formulario */
.form-group {
    margin-bottom: 15px;
}

label {
    color: #ecf0f1; /* Texto claro */
    display: block;
    margin-bottom: 5px;
}

/* Ajuste de estilo para campos de entrada */
input[type="text"], input[type="number"], textarea {
    width: 96%; /* Ancho total */
    padding: 10px; /* Espaciado interno */
    margin-bottom: 10px; /* Espaciado inferior adicional */
    border-radius: 8px;
    border: 1px solid #7f8c8d; /* Borde en gris claro */
    background-color: rgba(255, 255, 255, 0.2); /* Fondo claro con opacidad */
    color: #ecf0f1; /* Texto claro */
    outline: none; /* Elimina borde azul al enfocar */
}

button {
    padding: 10px 20px;
    border-radius: 8px;
    background-color: #3498db; /* Color de fondo */
    color: #fff; /* Color de texto */
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Transición suave */
}

button:hover {
    background-color: #2980b9; /* Color de fondo más oscuro al pasar el cursor */
}
</style>

<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
@endsection
