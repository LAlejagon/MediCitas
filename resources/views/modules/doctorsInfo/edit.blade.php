@extends('layouts.main')

@section('contenido')
<div class="container mt-4">
    <h2>Actualizar Información del Doctor</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('doctorInfo.update', $doctorInfo->user_id) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        <label for="consultorio">Consultorio</label>
                        <input type="text" name="consultorio" id="consultorio" class="form-control" value="{{ $doctorInfo->consultorio }}" required>

                        <label for="especialidad_id">Selecciona la especialidad</label>
                        <select name="especialidad_id" id="especialidad_id" class="form-control" required>
                            <option value="">Seleccione una especialidad</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->especialidad_id }}" {{ $doctorInfo->especialidad_id == $specialty->especialidad_id ? 'selected' : '' }}>
                                    {{ $specialty->nombre }}
                                </option>
                            @endforeach
                        </select>

                        <button class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{ route('index')}}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection