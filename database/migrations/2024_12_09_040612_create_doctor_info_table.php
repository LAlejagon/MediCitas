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
        Schema::create('doctorInfo', function (Blueprint $table) {
            $table->string('user_id')->primary(); 
            $table->string('consultorio'); 
            $table->unsignedBigInteger('especialidad_id'); 
            $table->timestamps(); 

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('especialidad_id')->references('especialidad_id')->on('especialidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctorInfo', function (Blueprint $table) {
            // Eliminar las claves foráneas antes de eliminar la tabla
            $table->dropForeign(['cedula']);
            $table->dropForeign(['especialidad_id']);
        });

        Schema::dropIfExists('doctor_info');
    }
}