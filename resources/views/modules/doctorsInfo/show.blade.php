@extends('layouts/main')

<div class="container mt-4">
    <h2>Mostrar la info de: {{ $user->name }}</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID (Cédula)</th>
                                <th>Nombre</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Género</th>
                                <th>Edad</th>
                                <th>Tipo de Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->user_type }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>