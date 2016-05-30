<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrales', function(Blueprint $table) {
            $table->increments('idCorral')->unsigned();
            $table->string('descripcion', 255);
            $table->integer('ancho');
            $table->integer('largo');
            $table->integer('capacidad');
            $table->integer('capacidadUsada');
            $table->integer('tipoCorral');
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
        Schema::drop('corrales');
    }
}
