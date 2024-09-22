<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->date('date_birth');
            $table->string('address', 255)->nullable(); // Hacer address opcional
            $table->string('token', 255)->nullable();
            $table->string('password', 120);
            $table->string('mobile_phone', 255);
            $table->string('email', 255)->unique();
            $table->timestamps(); // Agregar timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};