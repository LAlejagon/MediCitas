@extends('layouts.main')

@section('contenido')
<div class="container mt-4">
    <h2>Actualizar Información de la Cita</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('date.update', $cita->cita_id) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $cita->fecha }}" required>

                        <label for="hora">Hora</label>
                        <input type="time" name="hora" id="hora" class="form-control" value="{{ $cita->hora }}" required>

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
                        <textarea name="razon" id="razon" class="form-control" rows="3">{{ $cita->razon }}</textarea>

                        <button class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection