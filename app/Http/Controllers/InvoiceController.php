<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Http\Response;
use App\Http\Resources\InvoiceResource; // Importa el recurso InvoiceResource

class InvoiceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
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

        try {
            $invoice = Invoice::create([
                'invoice_number' => $validated['invoice_number'],
                'issue_date' => $validated['issue_date'],
                'customer_name' => $validated['customer_name'],
                'customer_id' => $validated['customer_id'],
                'details' => json_encode($validated['details']),
                'total' => $validated['total'],
            ]);

            return new InvoiceResource($invoice); // Usar el recurso para la respuesta de la factura creada
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la factura',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $invoices = Invoice::all();
            return InvoiceResource::collection($invoices); // Usar el recurso para la colección de facturas
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No se pudieron obtener las facturas',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            return new InvoiceResource($invoice); // Usar el recurso para la respuesta de la factura
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Factura no encontrada',
                'message' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Generar y guardar la firma electrónica de una factura.
     */
    public function generateSignature($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);

            if ($invoice->signature) {
                return response()->json([
                    'message' => 'La factura ya tiene una firma generada.',
                    'invoice' => new InvoiceResource($invoice)
                ], Response::HTTP_BAD_REQUEST);
            }

            // Generamos una firma simple como ejemplo
            $signature = hash('sha256', $invoice->id . $invoice->total . $invoice->issue_date);

            // Actualizamos la factura con la firma generada
            $invoice->update(['signature' => $signature]);

            return new InvoiceResource($invoice); // Usar el recurso para la respuesta de la factura con firma
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al generar la firma',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
