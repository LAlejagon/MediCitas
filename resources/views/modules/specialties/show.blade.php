@extends('layouts/main')

<div class="container mt-4">
    <h2>Mostrar la info de: {{ $specialty->name }}</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $specialty->especialidad_id }}</td>
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