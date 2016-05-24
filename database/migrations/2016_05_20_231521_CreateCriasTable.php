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
            $table->integer('idRegistro');
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 3, 2);
            $table->integer('edad');
            $table->string('colorPelaje', 50);
            $table->string('raza', 50);
            $table->string('colorMusculo', 50);
            $table->integer('clasificacion');
            $table->integer('estado');
            $table->integer('idDieta');
            $table->integer('idTratamiento');
            $table->integer('idSensor');
            $table->integer('idCorral');
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
        Schema::drop('crias');
    }
}
