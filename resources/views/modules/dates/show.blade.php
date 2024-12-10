@extends('layouts.main')

<div class="container mt-4">
    <h2>Detalles de la Cita</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID (Cédula del Usuario)</th>
                                <th>Nombre del Usuario</th>
                                <th>Email del Usuario</th>
                                <th>Género del Usuario</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Doctor</th>
                                <th>Razón</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $cita->fecha }}</td>
                                <td>{{ $cita->hora }}</td>
                                <td>{{ $doctorInfo->user->name }}</td> <!-- Asumiendo que el nombre del doctor está en el modelo User -->
                                <td>{{ $cita->razon }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>