@extends('layouts/main')

<div class="container mt-4">
    <h2>Agregar nuevo Doctor Info</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('doctorInfo.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <label for="user_id">Escribe la cédula del usuario</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Seleccione usu id</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id }}</option>
                            @endforeach
                        </select>
                        
                        <label for="consultorio">Consultorio</label>
                        <input type="text" name="consultorio" id="consultorio" class="form-control" required>
                        
                        <label for="especialidad_id">Selecciona la especialidad</label>
                        <select name="especialidad_id" id="especialidad_id" class="form-control" required>
                            <option value="">Seleccione una especialidad</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->especialidad_id }}">{{ $specialty->nombre }}</option>
                            @endforeach
                        </select>
                        
                        <button class="btn btn-primary mt-3">Agregar</button>
                        <a href="{{ route('index')}}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>