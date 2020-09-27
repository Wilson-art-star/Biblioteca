<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_editorial')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_autor')->unsigned();
            $table->integer('id_idioma')->unsigned();
            $table->string('nombre',100);
            $table->integer('cantidad');
            $table->date('ano_publicado',100);
            $table->string('num_paginas',7);
            $table->string('ubicacion',50);
            $table->string('edicion',5);

            $table->foreign('id_editorial')->references('id')->on('editorials');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_autor')->references('id')->on('autores');
            $table->foreign('id_idioma')->references('id')->on('idiomas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
