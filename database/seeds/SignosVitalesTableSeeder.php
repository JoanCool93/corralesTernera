<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\SignoVital;

class SignosVitalesTableSeeder extends Seeder
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

        DB::table('signosVitales')->truncate();

        SignoVital::create([
            'idSignos'					=> 1,
            'idSensor'					=> 2,
            'presionSanguinea'    		=> 130,
            'frecuenciaCardiaca'    	=> 80,
            'frecuenciaRespiratoria'	=> 15,
            'temperatura'				=> 36
        ]);
    }
}
