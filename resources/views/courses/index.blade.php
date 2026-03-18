@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Cursos</h2>

    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">
        Nuevo Curso
    </a>

    <table class="table table-bordered" id="tablaCursos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Capacidad</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("{{ route('courses.dt') }}")
        .then(response => response.json())
        .then(data => {
            let tabla = document.querySelector("#tablaCursos tbody");
            tabla.innerHTML = "";

            data.forEach(course => {
                tabla.innerHTML += `
                    <tr>
                        <td>${course.id}</td>
                        <td>${course.name}</td>
                        <td>${course.description}</td>
                        <td>${course.capacity}</td>
                        <td>${course.status}</td>
                        <td>
                            <a href="/courses/${course.id}/edit" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="/courses/${course.id}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este curso?')">
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
