@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Venta</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Maquinaria</label>
            <select name="machinery_id" class="form-control" required>
                @foreach($machinery as $m)
                    <option value="{{ $m->id }}">
                        {{ $m->name }} - {{ $m->model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Fecha</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <select name="type" class="form-control">
                <option value="sale">Venta</option>
                <option value="rent">Renta</option>
                <option value="service">Servicio</option>
            </select>
        </div>

        <button class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
