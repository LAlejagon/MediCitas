@extends('layouts.main')

@section('contenido')
<div class="container mt-4">
    <h2>Agregar Nueva Cita</h2>
    <form action="{{ route('date.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>

        <label for="hora">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" required>

        <label for="cedula_usuario">Cédula del Usuario</label>
        <select name="cedula_usuario" id="cedula_usuario" class="form-control" required>
            <option value="">Seleccione un usuario</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->id }}</option>
            @endforeach
        </select>

        <label for="doctor_id">Selecciona el Doctor</label>
        <select name="doctor_id" id="doctor_id" class="form-control" required>
            <option value="">Seleccione un doctor</option>
            @foreach ($doctorsInfo as $doctorInfo)
                <option value="{{ $doctorInfo->user_id }}">{{ $doctorInfo->user_id }}</option>
            @endforeach
        </select>

        <label for="razon">Razón</label>
        <textarea name="razon" id="razon" class="form-control"></textarea>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection