@extends('layouts/main')

@section('contenido')
<div class="container mt-4">
    <h2>Crear Nueva Factura</h2>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('invoice.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="invoice_number">Número de Factura</label>
                            <input type="text" class="form-control" id="invoice_number" name="invoice_number" placeholder="Ingrese el número de la factura" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="issue_date">Fecha de Emisión</label>
                            <input type="date" class="form-control" id="issue_date" name="issue_date" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="customer_name">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Ingrese el nombre del cliente" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="total">Total</label>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Ingrese el total" step="0.01" required>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar Factura</button>
                        <a href="{{ route('invoice.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    