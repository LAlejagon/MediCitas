<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = \App\Models\Invoice::class;

    public function definition()
    {
        return [
            'invoice_number' => $this->faker->unique()->numerify('INV#####'), // Ejemplo: INV12345
            'issue_date' => $this->faker->date(), // Fecha aleatoria
            'customer_name' => $this->faker->name(), // Nombre aleatorio
            'customer_id' => $this->faker->numerify('#########'), // Ejemplo: 123456789
            'details' => json_encode([
                ['item' => $this->faker->word(), 'price' => $this->faker->randomFloat(2, 10, 500)]
            ]), // Lista de detalles codificada como JSON
            'total' => $this->faker->randomFloat(2, 100, 10000), // Total entre 100 y 10000
            'signature' => null, // Sin firma inicial
        ];
    }
}

