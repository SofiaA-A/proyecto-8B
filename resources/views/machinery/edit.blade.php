@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Maquinaria</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('machinery.update', $machinery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $machinery->name }}" class="form-control mb-2" placeholder="Nombre">

        <input type="text" name="model" value="{{ $machinery->model }}" class="form-control mb-2" placeholder="Modelo">

        <select name="status" class="form-control mb-2">
            <option value="available" {{ $machinery->status == 'available' ? 'selected' : '' }}>Disponible</option>
            <option value="in_use" {{ $machinery->status == 'in_use' ? 'selected' : '' }}>En uso</option>
            <option value="maintenance" {{ $machinery->status == 'maintenance' ? 'selected' : '' }}>Mantenimiento</option>
        </select>

        <input type="text" name="serial_number" value="{{ $machinery->serial_number }}" class="form-control mb-2" placeholder="Número de serie">

        {{-- CAMPO DE IMAGEN --}}
        <div class="mb-2">
            <label>Imagen</label>
            <input type="file" name="image" class="form-control">
        </div>

        {{-- MOSTRAR IMAGEN ACTUAL --}}
        @if($machinery->image)
            <div class="mb-2">
                <p>Imagen actual:</p>
                <img src="{{ asset('storage/images/'.$machinery->image) }}" width="150">
            </div>
        @else
            <p>No hay imagen cargada</p>
        @endif

        <button class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
