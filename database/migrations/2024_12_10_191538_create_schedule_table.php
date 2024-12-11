<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->string('user_id')->primary(); // Columna para el ID del usuario
            $table->unsignedBigInteger('cita_id'); // Cambiar a unsignedBigInteger
            $table->date('fecha'); // Columna para la fecha
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at'
        
            // Definir las claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cita_id')->references('cita_id')->on('dates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
