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
        Schema::create('dates', function (Blueprint $table) {
            $table->id('cita_id'); // Primary key
            $table->date('fecha');
            $table->time('hora');
            $table->string('cedula_usuario'); // Foreign key to users
            $table->string('doctor_id'); // Foreign key to doctors
            $table->string('lugar');
            $table->string('direccion');
            $table->text('razon')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cedula_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('user_id')->on('doctor_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
