<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Sensor;

class SensoresTableSeeder extends Seeder
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

        //DB::table('sensores')->truncate();

        Sensor::create([
            'idSensor'      => 1,
            'descripcion'   => 'Ninguno',
            'estado'        => 1
        ]);

        Sensor::create([
            'idSensor'		=> 2,
            'descripcion'	=> 'Sensor 1',
            'estado'        => 1
        ]);

        Sensor::create([
            'idSensor'		=> 3,
            'descripcion'	=> 'Sensor 2',
            'estado'        => 1
        ]);

        Sensor::create([
            'idSensor'		=> 4,
            'descripcion'	=> 'Sensor 3',
            'estado'        => 1
        ]);
    }
}
