@extends('layouts/main')

@section('contenido')
    <div class="container mt-4">
        <h2>Usuarios</h2>
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('create')}}" class="btn btn-primary">Agregar</a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID (Cédula)</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th> <!-- Added a header for actions -->
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($items as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('show', $item->id) }}" class="btn btn-info">Mostrar</a>
                                            <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Editar</a>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Vacio</td> <!-- Adjusted colspan for empty row -->
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