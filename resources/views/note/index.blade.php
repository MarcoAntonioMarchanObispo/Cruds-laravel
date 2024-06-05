@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Notas</h1>
    <a href="{{ route('note.create') }}" class="btn btn-primary mb-3">Crear nueva nota</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td><a href="{{ route('note.show', $note->id) }}">{{ $note->title }}</a></td>
                    <td>
                        <a href="{{ route('note.edit', $note->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('note.destroy', $note->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta nota?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay notas disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
