@extends('layouts/main')

@section('contenido')
<div class="container mt-4">
    <h2>Factura No: {{ $invoice->invoice_number }}</h2>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Campo</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Número de Factura</td>
                                <td>{{ $invoice->invoice_number }}</td>
                            </tr>
                            <tr>
                                <td>Fecha de Emisión</td>
                                <td>{{ $invoice->issue_date }}</td>
                            </tr>
                            <tr>
                                <td>Cliente</td>
                                <td>{{ $invoice->customer_name }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>${{ number_format($invoice->total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('invoice.index') }}" class="btn btn-secondary mt-4">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
