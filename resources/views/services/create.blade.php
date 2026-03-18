@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Servicio</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="description" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <select name="type" class="form-control">
                <option value="maintenance">Mantenimiento</option>
                <option value="training">Capacitación</option>
                <option value="sale">Venta</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
