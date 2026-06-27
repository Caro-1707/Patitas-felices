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
        Schema::create('solicitudes_adopcion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('mascota_id')
                  ->constrained('mascotas')
                  ->onDelete('cascade');

            $table->string('vivienda');
            $table->boolean('tiene_patio');
            $table->boolean('tiene_otras_mascotas');

            $table->text('experiencia_mascotas');
            $table->text('motivo_adopcion');
            $table->string('tiempo_disponible');

            $table->enum('estado', [
                'Pendiente',
                'Aprobada',
                'Rechazada'
            ])->default('Pendiente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes_adopcion');
    }
};
