@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Usuario</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option value="admin">Administrador</option>
                <option value="client">Cliente</option>
                
            </select>
        </div>

        <button class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
