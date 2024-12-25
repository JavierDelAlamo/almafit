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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            //Usuario que crea la Entrada
            $table->unsignedBigInteger('user_id');
            //Relacion ForeignKey
            $table->foreign('user_id')->references('id')->on ('users');
            //Categoria que crea la Entrada
            $table->unsignedBigInteger('categoria_id');
            //Relacion ForeingK
            $table->foreign('categoria_id')->references('id')->on ('categorias');
            $table->string('titulo');
            //la etiqueta va a ser unica, renderizado SEO como motor de busqueda en la URL
            $table->string('slug');
            $table->text('cuerpo');
            $table->string ('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
