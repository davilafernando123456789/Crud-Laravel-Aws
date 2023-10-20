@extends('layout.template')

@section('titlePage', 'Laravel | Eliminar persona')

@section('content')

    <section class="my-5">
        <div class="card">
            <div class="card-header">
                Eliminar persona
            </div>
            <div class="card-body">
                <div class="alert alert-danger" role="alert">Confirma que desea eliminar este registro</div>
                <form action="{{ route('personas.destroy', $persona->id) }}" method="post">
                    
                    <!-- token de seguridad -->
                    @csrf
                    <!-- verbo HTTP de edición -->
                    @method('DELETE')

                    <div class="mb-3">    
                        <label class="form-label">
                        Nombre:
                        <input type="text" name="nombre" class="form-control" disabled value="{{ $persona->nombre }}">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                        Apellido paterno:
                        <input type="text" name="paterno" class="form-control" disabled value="{{ $persona->paterno }}">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                        Apellido materno:
                        <input type="text" name="materno" class="form-control" disabled value="{{ $persona->materno }}">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                        Fecha de nacimiento:
                        <input type="date" name="fecha_nacimiento" class="form-control" disabled value="{{ $persona->fecha_nacimiento }}">
                        </label>
                    </div>
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary"><i class="fas fa-angle-left"></i> Cancelar</a>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Eliminar </button>
                </form>
            </div>
        </div>
    </section>
    
@endsection