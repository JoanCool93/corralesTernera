<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Tratamiento;

class TratamientosTableSeeder extends Seeder
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

        //DB::table('tratamientos')->truncate();

        Tratamiento::create([
            'idTratamiento'		=> 1,
            'nombre'		=> 'Ninguno',
            'descripcion'	=> '-'
        ]);

        Tratamiento::create([
            'idTratamiento'		=> 2,
            'nombre'		=> 'Tratamiento Fiebre de leche',
            'descripcion'	=> 'Calcio intravenoso o subcutáneo'
        ]);

        Tratamiento::create([
            'idTratamiento'		=> 3,
            'nombre'		=> 'Tratamiento Cetosis',
            'descripcion'	=> 'Casos subclínicos, dar 300 ml de propilenglicol oralmente una vez al día por cinco días. Para casos clínicos, dar dextrosa  IV para aumentar temporalmente los niveles de glucosa en sangre y continuar con el propilenglicol para un aumento más sustancioso.'
        ]);
    }
}
