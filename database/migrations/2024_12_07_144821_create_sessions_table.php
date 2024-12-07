<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->text('payload');
            $table->integer('last_activity')->index();
            $table->unsignedBigInteger('user_id')->nullable(); // Agregar esta línea
            $table->ipAddress('ip_address')->nullable(); // Si necesitas almacenar la dirección IP
            $table->string('user_agent')->nullable(); // Si necesitas almacenar el user agent
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}