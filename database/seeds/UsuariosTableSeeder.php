<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class UsuariosTableSeeder extends Seeder
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

        DB::table('usuarios')->truncate();

        Usuario::create([
            'idUsuario'	=> 1,
            'nombre'	=> 'Jose Antonio',
            'apellidoPaterno'    => 'Corona',
            'apellidoMaterno'    => 'Olivas',
            'email'		=> 'jose_k106@hotmail.com',
            'password'	=> bcrypt('alquimista'),
            'idRole'            => 2
        ]);

        Usuario::create([
            'idUsuario'	=> 2,
            'nombre'	=> 'Josue Alejandro',
            'apellidoPaterno'    => 'Corona',
            'apellidoMaterno'    => 'Olivas',
            'email'		=> 'josue@hotmail.com',
            'password'	=> bcrypt('alquimista'),
            'idRole'            => 3
        ]);

        Usuario::create([
            'idUsuario'	=> 3,
            'nombre'	=> 'Marco Antonio',
            'apellidoPaterno'    => 'Lazcano',
            'apellidoMaterno'    => 'Arreola',
            'email'		=> 'marco@hotmail.com',
            'password'	=> bcrypt('alquimista'),
            'idRole'            => 4
        ]);

        Usuario::create([
            'idUsuario' => 4,
            'nombre'    => 'Manuel Alejandro',
            'apellidoPaterno'    => 'German',
            'apellidoMaterno'    => 'Gutierrez',
            'email'     => 'manuelg@hotmail.com',
            'password'  => bcrypt('patronus35'),
            'idRole'            => 2
        ]);
    }
}
