<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('issue_date');
            $table->string('customer_name');
            $table->string('customer_id');
            $table->json('details'); // Almacenamos los detalles de la factura como JSON
            $table->decimal('total', 10, 2); // Aseguramos precisión en el total
            $table->string('signature')->nullable(); // Firma electrónica
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
