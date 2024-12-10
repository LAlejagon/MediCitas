<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // ID único para cada factura
            $table->string('invoice_number')->unique(); // Número único de la factura
            $table->date('issue_date'); // Fecha de emisión
            $table->string('customer_name'); // Nombre del cliente
            $table->string('customer_id'); // Identificación del cliente
            $table->text('details'); // Detalles de productos/servicios
            $table->decimal('total', 15, 2); // Total de la factura
            $table->string('signature')->nullable(); // Firma electrónica (hash único)
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
