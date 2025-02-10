<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // ID autogenerado
            $table->string('brand');  // Marca
            $table->string('model');  // Modelo
            $table->integer('year');  // Año
            $table->string('color');  // Color
            $table->decimal('price', 10, 2); // Precio
            $table->timestamps();  // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
