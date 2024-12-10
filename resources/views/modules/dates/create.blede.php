@extends('layouts.main')

@section('contenido')
<div class="container mt-4">
    <h2>Agregar Nueva Fecha</h2>
    <form action="{{ route('date.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>

        <label for="hora">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" required>

        <label for="cedula_usuario">Cédula del Usuario</label>
        <input type="text" name="cedula_usuario" id="cedula_usuario" class="form-control" required>

        <label for="doctor_id">ID del Doctor</label>
        <input type="text" name="doctor_id" id="doctor_id" class="form-control" required>

        <label for="lugar">Lugar</label>
        <input type="text" name="lugar" id="lugar" class="form-control" required>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" class="form-control" required>

        <label for="razon">Razón</label>
        <textarea name="razon" id="razon" class="form-control"></textarea>

        <button class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('date.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
