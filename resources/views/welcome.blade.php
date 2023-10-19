@extends('layout/template')


@section('titlePage', 'Laravel | CRUD')

@section('content')
    <div class="row">
        <h1>Laravel 10 | CRUD</h1>
        <p><i class="far fa-save"></i> Hello world, usings layouts Blade</p>
        <a href="{{ route('personas.create') }}"><i class="fas fa-user-plus"></i> Agregar</a>
    </div>
@endsection