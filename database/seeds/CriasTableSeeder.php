<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Cria;

class CriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }

        //DB::table('crias')->truncate();

        Cria::create([
            'idCria'		=> 1,
            'idRegistro'	=> 1,
            'peso'			=> 250,
            'altura'		=> 0.90,
            'edad'			=> 7,
            'colorPelaje'	=> 'Marron',
            'raza'			=> 'Holando',
            'colorMusculo'	=> 'Cereza',
            'clasificacion'	=> 2,
            'estado'		=> 1,
            'idDieta'		=> 1,
            'idTratamiento'	=> 1,
            'idSensor'		=> 1,
            'idCorral'      => 1
        ]);
    }
}
