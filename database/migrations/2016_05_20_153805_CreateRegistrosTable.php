<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function(Blueprint $table) {
            $table->increments('idRegistro')->unsigned();
            $table->integer('idProveedor')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('estado');
            $table->timestamps();
        });

       Schema::table('registros', function($table) {

            $table->foreign('idProveedor')
                ->references('idProveedor')->on('proveedores');

            $table->foreign('idUsuario')
                ->references('idUsuario')->on('usuarios');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('registros');
    }
}
