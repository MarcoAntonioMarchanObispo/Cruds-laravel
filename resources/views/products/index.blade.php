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
    overflow: hidden; /* Evita el desplazamiento vertical */
}

.container {
    width: 80%; /* Ancho del contenedor */
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

/* Estilos para el formulario de búsqueda */
.search-form {
    display: flex; /* Flexbox para alinear los elementos */
    justify-content: center; /* Centra el formulario */
    margin-bottom: 20px; /* Espaciado inferior */
}

.search-input {
    flex-grow: 1; /* El campo de búsqueda se extiende para llenar el espacio disponible */
    padding: 10px; /* Espaciado interno */
    border-radius: 8px;
    border: 1px solid #7f8c8d; /* Borde en gris claro */
    background-color: rgba(255, 255, 255, 0.2); /* Fondo claro con opacidad */
    color: #ecf0f1; /* Texto claro */
    outline: none; /* Elimina borde azul al enfocar */
}

.search-button {
    padding: 10px 20px; /* Espaciado interno */
    border-radius: 8px;
    background-color: #3498db; /* Color de fondo */
    color: #fff; /* Color de texto */
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Transición suave */
}

.search-button:hover {
    background-color: #2980b9; /* Color de fondo más oscuro al pasar el cursor */
}

/* Estilos para la tabla */
.table {
    width: 100%; /* Ancho total de la tabla */
    border-collapse: collapse;
    margin-top: 20px;
    background-color: rgba(52, 73, 94, 0.8); /* Fondo oscuro con opacidad */
}

th, td {
    padding: 10px;
    border: 1px solid #7f8c8d; /* Bordes en gris claro */
    color: #bdc3c7; /* Texto claro */
}

th {
    background-color: #2c3e50; /* Fondo más oscuro */
    color: #ecf0f1; /* Texto claro */
}

/* Estilos para los botones de acción */
.btn-primary, .btn-warning, .btn-danger {
    color: white;
    border-radius: 8px;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
}

.btn-primary {
    background-color: #3498db;
    margin-bottom: 20px;
}

.btn-warning {
    background-color: #f39c12;
}

.btn-danger {
    background-color: #e74c3c;
}

.btn:hover {
    opacity: 0.9; /* Efecto hover */
    transition: opacity 0.3s ease; /* Transición suave */
}

/* Estilo de paginación */
.pagination {
    display: flex; /* Alinea los elementos en una fila */
    justify-content: center; /* Centra los elementos */
    list-style: none; /* Elimina viñetas de lista */
    padding: 0; /* Elimina el relleno interno */
    margin-top: 20px; /* Espaciado superior */
}

.page-item {
    margin: 0 5px; /* Espaciado entre elementos */
}

.page-link {
    color: #ecf0f1; /* Texto claro */
    background-color: #2c3e50; /* Fondo oscuro */
    border-radius: 8px; /* Bordes redondeados */
    padding: 8px 12px; /* Espaciado interno */
    text-decoration: none; /* Elimina subrayado */
    border: 1px solid #7f8c8d; /* Bordes claros */
}

.page-link:hover {
    background-color: #3498db; /* Fondo azul claro al pasar el cursor */
    color: white;
    transition: background-color 0.3s ease; /* Transición suave */
}

.page-item.active .page-link {
    background-color: #3498db; /* Fondo azul claro */
    border-color: #3498db; /* Borde azul claro */
    color: white;
}
</style>

<div class="container">
    <h1>Productos</h1>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('products.index') }}" method="GET" class="search-form">
        <input type="text" name="query" class="search-input" placeholder="Buscar productos..." value="{{ request('query') }}">
        <button type="submit" class="search-button">Buscar</button>
    </form>

    <!-- Botón para añadir productos -->
    <a href="{{ route('products.create') }}" class="btn btn-primary">Añadir producto</a>

    <!-- Tabla de productos -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Enlaces de paginación -->
    <div class="pagination">
        {{ $products->links('vendor.pagination.custom-pagination') }}
    </div>
</div>
@endsection
