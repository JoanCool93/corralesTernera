<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crias', function(Blueprint $table) {
            $table->string('idCria');
            $table->primary('idCria');
            $table->integer('idRegistro')->unsigned();
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 3, 2);
            $table->integer('edad');
            $table->string('colorPelaje', 50);
            $table->string('raza', 50);
            $table->string('colorMusculo', 50);
            $table->integer('clasificacion');
            $table->integer('estado');
            $table->integer('idDieta')->unsigned();
            $table->integer('idTratamiento')->unsigned();
            $table->integer('idSensor')->unsigned();
            $table->integer('idCorral')->unsigned();
            $table->timestamps();
        });

       Schema::table('crias', function($table) {

            $table->foreign('idRegistro')->references('idRegistro')->on('registros');

            $table->foreign('idDieta')->references('idDieta')->on('dietas');

            $table->foreign('idTratamiento')->references('idTratamiento')->on('tratamientos');

            $table->foreign('idSensor')->references('idSensor')->on('sensores');

            $table->foreign('idCorral')->references('idCorral')->on('corrales');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('crias');
    }
}
