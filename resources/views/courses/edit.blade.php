@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Curso</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $course->name }}" class="form-control mb-2">

        <input type="text" name="description" value="{{ $course->description }}" class="form-control mb-2">

        <input type="number" name="capacity" value="{{ $course->capacity }}" class="form-control mb-2">

        <select name="status" class="form-control mb-2">
            <option value="active" {{ $course->status == 'active' ? 'selected' : '' }}>Activo</option>
            <option value="inactive" {{ $course->status == 'inactive' ? 'selected' : '' }}>Inactivo</option>
        </select>

        <button class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
