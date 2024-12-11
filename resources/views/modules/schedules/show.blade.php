@extends('layouts/main')

<div class="container mt-4">
    <h2>Mostrar la info de: {{ $doctorInfo->user_id }}</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID (Cédula)</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Género</th>
                                <th>Consultorio</th>
                                <th>Especialidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $doctorInfo->consultorio }}</td>
                                <td>{{ $specialty->nombre }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>