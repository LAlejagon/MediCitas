@extends('layouts/main')

<div class="container mt-4">
    <h2>Actualizar especialidad</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('specialty.update', $specialty->especialidad_id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="name">Escribe el nombre de la especialidad</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ $specialty->nombre }}">

                        <button class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>