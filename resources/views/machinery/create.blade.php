@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Maquinaria</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('machinery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Modelo</label>
            <input type="text" name="model" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-control">
                <option value="available">Disponible</option>
                <option value="in_use">En uso</option>
                <option value="maintenance">Mantenimiento</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Número de serie</label>
            <input type="text" name="serial_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Imagen:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
