@extends('layouts.main')

@section('contenido')
<div class="container mt-4">
    <h2>Detalles de la Fecha</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $date->date_id }}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{ $date->fecha }}</td>
        </tr>
        <tr>
            <th>Hora</th>
            <td>{{ $date->hora }}</td>
        </tr>
        <tr>
            <th>Cédula del Usuario</th>
            <td>{{ $date->cedula_usuario }}</td>
        </tr>
        <tr>
            <th>ID del Doctor</th>
            <td>{{ $date->doctor_id }}</td>
        </tr>
        <tr>
            <th>Lugar</th>
            <td>{{ $date->lugar }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $date->direccion }}</td>
        </tr>
        <tr>
            <th>Razón</th>
            <td>{{ $date->razon }}</td>
        </tr>
    </table>
    <a href="{{ route('date.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
