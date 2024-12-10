@extends('layouts.main')

@section('contenido')
<div class="container mt-4">
    <h2>Editar Fecha</h2>
    <form action="{{ route('date.update', $date->date_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $date->fecha }}" required>

        <label for="hora">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" value="{{ $date->hora }}" required>

        <label for="cedula_usuario">Cédula del Usuario</label>
        <input type="text" name="cedula_usuario" id="cedula_usuario" class="form-control" value="{{ $date->cedula_usuario }}" required>

        <label for="doctor_id">ID del Doctor</label>
        <input type="text" name="doctor_id" id="doctor_id" class="form-control" value="{{ $date->doctor_id }}" required>

        <label for="lugar">Lugar</label>
        <input type="text" name="lugar" id="lugar" class="form-control" value="{{ $date->lugar }}" required>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $date->direccion }}" required>

        <label for="razon">Razón</label>
        <textarea name="razon" id="razon" class="form-control">{{ $date->razon }}</textarea>

        <button class="btn btn-primary mt-3">Guardar Cambios</button>
        <a href="{{ route('date.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
