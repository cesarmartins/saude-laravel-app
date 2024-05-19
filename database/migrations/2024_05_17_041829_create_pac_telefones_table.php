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
        Schema::create('pac_telefones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pac_codigo');
            $table->string('telefone');
            $table->timestamps();

            $table->foreign('pac_codigo')->references('pac_codigo')->on('paciente')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pac_telefones');
    }
};
