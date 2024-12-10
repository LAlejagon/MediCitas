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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary(); // Cambiado a string para permitir ceros a la izquierda
            $table->string('name');
            $table->string('phone')->nullable(); // Puedes hacer que el teléfono sea opcional
            $table->string('email')->unique();
            $table->string('address')->nullable(); // Puedes hacer que la dirección sea opcional
            $table->string('gender')->nullable(); // Puedes hacer que el género sea opcional
            $table->integer('age')->nullable(); // Puedes hacer que la edad sea opcional
            $table->string('password');
            $table->string('health_history')->nullable(); // Agregada la columna health_history
            $table->string('user_type')->nullable(); // Agregada la columna user_type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};