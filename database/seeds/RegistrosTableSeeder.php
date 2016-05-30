<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Registro;

class RegistrosTableSeeder extends Seeder
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

        //DB::table('registros')->truncate();

        Registro::create([
            'idRegistro'	=> 1,
            'idProveedor'	=> 2,
            'idUsuario'		=> 3,
            'estado'		=> 1
        ]);
    }
}
