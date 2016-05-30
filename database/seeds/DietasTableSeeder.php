<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Dieta;

class DietasTableSeeder extends Seeder
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

        //DB::table('dietas')->truncate();

        Dieta::create([
            'idDieta'       => 1,
            'nombre'        => 'Ninguna',
            'descripcion'   => '-'
        ]);

        Dieta::create([
            'idDieta'		=> 2,
            'nombre'		=> 'Dieta crias <50kg',
            'descripcion'	=> '10kg.- 75%: (Maiz, sorgo, trigo), 25%: Heno alfalfa'
        ]);

        Dieta::create([
            'idDieta'		=> 3,
            'nombre'		=> 'Dieta crias <100kg',
            'descripcion'	=> '15kg.- 75%: (Maiz, sorgo, trigo), 25%: Heno alfalfa'
        ]);

        Dieta::create([
            'idDieta'		=> 4,
            'nombre'		=> 'Dieta crias >300kg',
            'descripcion'	=> '10kg.- 35%: Maiz, 18%: Sorgo, 25%: Polinaza, 22%: Zacate'
        ]);
    }
}
