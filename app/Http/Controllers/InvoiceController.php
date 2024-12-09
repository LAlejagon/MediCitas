<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    // Crear una nueva factura
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => 'required|string|unique:invoices,invoice_number',
            'issue_date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'customer_id' => 'required|string|max:255',
            'details' => 'required|array',
            'total' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::create([
            'invoice_number' => $validated['invoice_number'],
            'issue_date' => $validated['issue_date'],
            'customer_name' => $validated['customer_name'],
            'customer_id' => $validated['customer_id'],
            'details' => json_encode($validated['details']),
            'total' => $validated['total'],
        ]);

        return response()->json(['invoice' => $invoice], 201);
    }

    // Obtener todas las facturas
    public function index()
    {
        $invoices = Invoice::all();
        return response()->json(['invoices' => $invoices]);
    }

    // Obtener una factura específica
    public function show($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            return response()->json(['invoice' => $invoice]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Factura no encontrada'], 404);
        }
    }

    // Generar y guardar la firma electrónica de una factura
    public function generateSignature($id)
    {
        $invoice = Invoice::findOrFail($id);

        if ($invoice->signature) {
            return response()->json([
                'message' => 'La factura ya tiene una firma generada.',
                'invoice' => $invoice
            ], 400);
        }

        $signature = hash('sha256', $invoice->id . $invoice->total . $invoice->issue_date);

        $invoice->update(['signature' => $signature]);

        return response()->json(['invoice' => $invoice], 200);
    }
}
