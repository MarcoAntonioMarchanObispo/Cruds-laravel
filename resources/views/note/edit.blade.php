@extends('layouts.app')

@section('content')
<a href="{{route('note.index')}}">back</a>
<form method="POST" action="{{route('note.update', $note->id) }}">
    @method('PUT')
    @csrf 
    <label>Title:</label>
    <input type="text" name="title"  value="{{ $note -> title }}"/>
        @error('title')
            <p style="color:red;">{{ $message}}</p>
        @enderror
    <label>Descripcion:</label>
    <input type="text" name="description"  value="{{ $note -> description }}"/>
        @error('title')
            <p style="color:red;">{{ $message}}</p>
        @enderror
    <input type="submit" value="Update"/>
</form>
@endsection