<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_info', function (Blueprint $table) {
            $table->string('user_id')->primary(); // Clave primaria
            $table->string('consultorio'); 
            $table->unsignedBigInteger('especialidad_id'); 
            $table->timestamps(); 

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('cascade'); // Ajusta el nombre si es diferente
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Laravel elimina automáticamente las claves foráneas al eliminar la tabla
        Schema::dropIfExists('doctor_info');
    }
}
