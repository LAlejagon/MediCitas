@extends('layouts/main')

@section('contenido')
    <div class="container mt-4">
        <h2>Crud con laravel 11 - Nombres</h2>
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('create')}}" class="btn btn-primary">Agregar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection