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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctorsInfo as $doctorInfo)
                                <tr>
                                    <td>{{ $doctorInfo->user_id }}</td> <!-- Mostrar el ID del doctor -->
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

        // Citas

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('date.create')}}" class="btn btn-primary">Agregar Cita</a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dates as $date)
                                <tr>
                                    <td>{{ $date->cita_id }}</td>
                                    <td>{{ $date->fecha }}</td>
                                    <td>
                                        <form action="{{ route('date.destroy', $date->cita_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('date.show', $date->cita_id) }}" class="btn btn-info">Mostrar</a>
                                            <a href="{{ route('date.edit', $date->cita_id) }}" class="btn btn-warning">Editar</a>
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
            
            // Schedule

            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('schedule.create')}}" class="btn btn-primary">Agregar Horario</a>
                            <hr>
                            <table class="table table-sm table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>ID (Usuario)</th>
                                        <th>ID (Cita)</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->user_id }}</td>
                                        <td>{{ $schedule->cita_id }}</td>
                                        <td>{{ $schedule->fecha }}</td>
                                        <td>
                                            <form action="{{ route('schedule.destroy', $schedule->user_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('schedule.show', $schedule->user_id) }}" class="btn btn-info">Mostrar</a>
                                                <a href="{{ route('schedule.edit', $schedule->user_id) }}" class="btn btn-warning">Editar</a>
                                                <button type="submit" class="btn btn-danger">Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">No hay horarios registrados</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        // Invoices

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('invoice.create')}}" class="btn btn-primary">Agregar Factura</a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Factura No.</th>
                                    <th>Fecha de Emisión</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->issue_date }}</td>
                                    <td>{{ $invoice->customer_name }}</td>
                                    <td>${{ number_format($invoice->total, 2) }}</td>
                                    <td>
                                        <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-info">Mostrar</a>
                                            <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-warning">Editar</a>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No hay facturas registradas</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
