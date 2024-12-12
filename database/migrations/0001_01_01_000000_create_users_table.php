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
        $table->string('id')->primary(); // Definido como string para ceros a la izquierda y no auto incrementable
        $table->string('name');
        $table->string('email')->unique()->index();
        $table->string('address')->nullable();
        $table->string('gender')->nullable();
        $table->integer('age')->nullable();
        $table->string('password');
        $table->string('health_history')->nullable();
        $table->string('user_type')->nullable();
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