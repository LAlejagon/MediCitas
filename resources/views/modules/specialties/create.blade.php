@extends('layouts/main')

<div class="container mt-4">
    <h2>Agregar nueva especialidad</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('specialty.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <label for="specialty_id">Escribe el ID de la especialidad</label>
                        <input type="text" name="especialidad_id" id="especialidad_id" class="form-control" required>

                        <label for="name">Escribe el nombre de la especialidad</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>

                        <button class="btn btn-primary mt-3">Agregar</button>
                        <a href="{{ route('index')}}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>