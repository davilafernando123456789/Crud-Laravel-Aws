@extends('layout/template')


@section('titlePage', 'Laravel | CRUD')

@section('content')

<section class="my-5">
    <div class="card">
        <div class="card-header">
            CRUD con Laravel 10 y MySQL
        </div>
        <div class="card-body">
            <h5 class="card-title">Lista de personas</h5>
            <p><a href="{{ route('personas.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Agregar persona</a></p>
            <hr>
            <div class="table table-responsive">
                <table class="table table-sm table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Fecha de nacimiento</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr>
                                <td>{{ $dato->nombre }}</td>
                                <td>{{ $dato->paterno }}</td>
                                <td>{{ $dato->materno }}</td>
                                <td>{{ $dato->fecha_nacimiento }}</td>
                                <td><a href="{{ route('personas.edit') }}" class="btn btn-info btn-sm"><i class="fas fa-user-edit"></i> Editar</a></td>
                                <td><a href="{{ route('personas.delete') }}" class="btn btn-danger btn-sm"><i class="fas fa-user-minus"></i> Eliminar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection