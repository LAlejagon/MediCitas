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
            $table->string('user_id'); // Foreign key to users
            $table->string('doctor_id'); // Foreign key to doctorInfo.user_id
            $table->string('lugar');
            $table->string('direccion');
            $table->text('razon')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('user_id')->on('doctorInfo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dates');
    }
};
