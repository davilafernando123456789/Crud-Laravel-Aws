@extends('layout.template')

@section('titlePage', 'Laravel | Editar persona')

@section('content')

    <section class="my-5">
        <div class="card">
            <div class="card-header">
                Editar persona
            </div>
            <div class="card-body">
                <form action="{{ route('personas.update', $persona->id) }}" method="post">
                    
                    <!-- token de seguridad -->
                    @csrf
                    <!-- verbo HTTP de edición -->
                    @method('PUT')

                    <div class="mb-3">    
                        <label class="form-label">
                        Nombre:
                        <input type="text" name="nombre" class="form-control" required value="{{ $persona->nombre }}">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                        Apellido paterno:
                        <input type="text" name="paterno" class="form-control" required value="{{ $persona->paterno }}">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                        Apellido materno:
                        <input type="text" name="materno" class="form-control" required value="{{ $persona->materno }}">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                        Fecha de nacimiento:
                        <input type="date" name="fecha_nacimiento" class="form-control" required value="{{ $persona->fecha_nacimiento }}">
                        </label>
                    </div>
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary"><i class="fas fa-angle-left"></i> Cancelar</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Guardar</button>
                </form>
            </div>
        </div>
    </section>
    
@endsection