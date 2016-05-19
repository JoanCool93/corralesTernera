<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Corral;

class CorralesTableSeeder extends Seeder
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

        DB::table('corrales')->truncate();

        Corral::create([
            'idCorral'		=> 1,
            'descripcion'	=> 'Corral 1',
            'ancho'			=> 25,
            'largo'			=> 55,
            'capacidad'		=> 450,
            'tipoCorral'	=> 1
        ]);

        Corral::create([
            'idCorral'		=> 2,
            'descripcion'	=> 'Corral 2',
            'ancho'			=> 20,
            'largo'			=> 60,
            'capacidad'		=> 500,
            'tipoCorral'	=> 2
        ]);

        Corral::create([
            'idCorral'		=> 3,
            'descripcion'	=> 'Corral 3',
            'ancho'			=> 35,
            'largo'			=> 65,
            'capacidad'		=> 650,
            'tipoCorral'	=> 3
        ]);

        Corral::create([
            'idCorral'		=> 4,
            'descripcion'	=> 'Corral 4',
            'ancho'			=> 30,
            'largo'			=> 70,
            'capacidad'		=> 600,
            'tipoCorral'	=> 1
        ]);

        
    }
}
