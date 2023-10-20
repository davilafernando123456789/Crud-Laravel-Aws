@extends('layout/template')


@section('titlePage', 'Laravel | CRUD')

@section('content')

<section class="my-5">
    <div class="card">
        <div class="card-header">
            CRUD con Laravel 10 y MySQL
        </div>
        <div class="card-body">

            <!-- Mensaje - validar la sesión -->
            @if ($mensaje = Session::get('message'))
                <div class="alert alert-info" role="alert">
                    {{ $mensaje }}
                </div>
            @endif

            <h5 class="card-title">Lista de personas</h5>
            <p><a href="{{ route('personas.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Agregar persona</a></p>
            <hr>
            <table class="table table-sm table-hover table-striped table-responsive">
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
                            <td>
                                <!-- al action del formulario tipo GET, agregar un parámetro adicional, el id -->
                                <form action="{{ route('personas.edit', $dato->id) }}" method="get">
                                    <button class="btn btn-info btn-sm"><i class="fas fa-user-edit"></i> Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('personas.show', $dato->id) }}" method="get">
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-user-minus"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <!-- paginación -->
            <aside>
                {{ $datos->links() }}
            </aside>
        </div>
    </div>
</section>

@endsection