<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignosVitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signosVitales', function(Blueprint $table) {
            $table->increments('idSignos')->unsigned();
            $table->integer('idSensor')->unsigned();
            $table->integer('presionSanguinea')->length(3);
            $table->integer('frecuenciaCardiaca')->length(3);
            $table->integer('frecuenciaRespiratoria')->length(2);
            $table->decimal('temperatura', 3, 1);
            $table->timestamps();
        });

       Schema::table('signosVitales', function($table) {

            $table->foreign('idSensor')->references('idSensor')->on('sensores');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('signosVitales');
    }
}
