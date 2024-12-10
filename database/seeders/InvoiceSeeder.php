<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        // Crear 50 facturas con datos aleatorios usando el factory
        Invoice::factory()->count(50)->create();
    }
}
