<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallesDoctor>
 */
class DetallesDoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cedula_doctor' => fake()->unique()->numberBetween(1000000, 9999999),
            'consultorio' => fake()->word() . ' ' . fake()->numberBetween(1, 100), // Ejemplo: "Consultorio 23"
            'especialidad_id' => fake()->numberBetween(1, 10), // Asumiendo que tienes 10 especialidades
        ];
    }
}