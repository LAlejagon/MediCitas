@extends('layouts/main')

<div class="container mt-4">
    <h2>Agregar nuevo Horario</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('schedule.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <label for="user_id">Escribe la cédula del usuario</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Seleccione un usuario</option>
                            @foreach ($doctorsInfo as $doctorInfo)
                                <option value="{{ $doctorInfo->user_id }}">{{ $doctorInfo->user_id }}</option>
                            @endforeach
                        </select>
                        
                        <label for="cita_id">Selecciona la cita</label>
                        <select name="cita_id" id="cita_id" class="form-control" required>
                            <option value="">Seleccione una cita</option>
                            @foreach ($dates as $date)
                                <option value="{{ $date->cita_id }}">{{ $date->fecha }} - {{ $date->hora }}</option>
                            @endforeach
                        </select>
                        
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" required>

                        <button class="btn btn-primary mt-3">Agregar</button>
                        <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>