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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
             $table->foreignId('categoria_id')
                ->constrained('categoria')
                ->onDelete('cascade');
            $table->string('nombre');
            $table->string('raza');
            $table->integer('edad');
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->text('descripcion');
            $table->string('foto')->nullable();
            $table->enum('estado', ['Disponible', 'En proceso', 'Adoptada'])
                ->default('Disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
