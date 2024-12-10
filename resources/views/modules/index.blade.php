@extends('layouts/main')

@section('contenido')
    <div class="container mt-4">
        <h2>Crud con Laravel 11 - Usuarios</h2>

        // Usuarios
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user.create')}}" class="btn btn-primary">Agregar Usuario</a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID (Cédula)</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">Mostrar</a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Vacio</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        // Especialidades

        <div class="row mt-4">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('specialty.create')}}" class="btn btn-primary">Agregar Especialidad</a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Especialidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($specialties as $specialty)
                                <tr>
                                    <td>{{ $specialty->nombre }}</td>
                                    <td>
                                        <form action="{{ route('specialty.destroy', $specialty->especialidad_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('specialty.show', $specialty->especialidad_id) }}" class="btn btn-info">Mostrar</a>
                                            <a href="{{ route('specialty.edit', $specialty->especialidad_id) }}" class="btn btn-warning">Editar</a>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Vacio</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        // Doctor Info

        <div class="row mt-4">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('doctorInfo.create')}}" class="btn btn-primary">Agregar Info Doctor</a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Especialidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctorsInfo as $doctorInfo)
                                <tr>
                                    <td>{{ $doctorInfo->especialidad }}</td>
                                    <td>
                                        <form action="{{ route('doctorInfo.destroy', $doctorInfo->user_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('doctorInfo.show', $doctorInfo->user_id) }}" class="btn btn-info">Mostrar</a>
                                            <a href="{{ route('doctorInfo.edit', $doctorInfo->user_id) }}" class="btn btn-warning">Editar</a>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Vacio</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    // Citas

<div class="row mt-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('cita.create')}}" class="btn btn-primary">Agregar Cita</a>
                <hr>
                <table class="table table-sm table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Usuario</th>
                            <th>Doctor</th>
                            <th>Lugar</th>
                            <th>Razón</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($citas as $cita)
                        <tr>
                            <td>{{ $cita->cita_id }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->cedula_usuario }}</td>
                            <td>{{ $cita->doctor_id }}</td>
                            <td>{{ $cita->lugar }}</td>
                            <td>{{ $cita->razon }}</td>
                            <td>
                                <form action="{{ route('cita.destroy', $cita->cita_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('cita.show', $cita->cita_id) }}" class="btn btn-info">Mostrar</a>
                                    <a href="{{ route('cita.edit', $cita->cita_id) }}" class="btn btn-warning">Editar</a>
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">No hay citas registradas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection