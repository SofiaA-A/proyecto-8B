@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Maquinaria</h2>

    <a href="{{ route('machinery.create') }}" class="btn btn-primary mb-3">
        Nueva Maquinaria
    </a>

    <table class="table table-bordered" id="tablaMachinery">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Status</th>
                <th>Serie</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("{{ route('machinery.dt') }}")
        .then(response => response.json())
        .then(data => {
            let tabla = document.querySelector("#tablaMachinery tbody");
            tabla.innerHTML = "";

            data.forEach(item => {

                let imagen = item.image
                    ? `<img src="/storage/images/${item.image}" width="100">`
                    : 'Sin imagen';

                tabla.innerHTML += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td>${item.model}</td>
                        <td>${item.status}</td>
                        <td>${item.serial_number}</td>
                        <td>${imagen}</td>
                        <td>
                            <a href="/machinery/${item.id}/edit" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="/machinery/${item.id}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar esta maquinaria?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
            });

        });
});
</script>
@endsection
