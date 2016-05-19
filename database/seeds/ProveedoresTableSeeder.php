<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Proveedor;

class ProveedoresTableSeeder extends Seeder
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

        DB::table('proveedores')->truncate();

        Proveedor::create([
            'idProveedor'	=> 1,
            'nombre'		=> 'Alberto Gallardo',
            'rfc'			=> '1hMpByhB',
            'descripcion'	=> 'Proveedor 1',
            'direccion'		=> 'CALLE JULIO REY PASTOR, 6 - 28007 - MADRID (MADRID)',
            'telefono'		=> '6673961848',
            'email'			=> 'albertog@hotmail.com'
        ]);

        Proveedor::create([
            'idProveedor'	=> 2,
            'nombre'		=> 'Luis Chiquete',
            'rfc'			=> 'meMFF1gd',
            'descripcion'	=> 'Proveedor 2',
            'direccion'		=> 'CALLE JULIO REY PASTOR, 6 - 28007 - MADRID (MADRID)',
            'telefono'		=> '6723851735',
            'email'			=> 'luisc@hotmail.com'
        ]);

        Proveedor::create([
            'idProveedor'	=> 3,
            'nombre'		=> 'Jose Medrano',
            'rfc'			=> '73NGkNNv',
            'descripcion'	=> 'Proveedor 3',
            'direccion'		=> 'CALLE JULIO REY PASTOR, 6 - 28007 - MADRID (MADRID)',
            'telefono'		=> '5552434335',
            'email'			=> 'josem@hotmail.com'
        ]);

        Proveedor::create([
            'idProveedor'	=> 4,
            'nombre'		=> 'Martin Cazares',
            'rfc'			=> 'v6HwH0Yk',
            'descripcion'	=> 'Proveedor 4',
            'direccion'		=> 'CALLE JULIO REY PASTOR, 6 - 28007 - MADRID (MADRID)',
            'telefono'		=> '6672435135',
            'email'			=> 'martinc@hotmail.com'
        ]);

        
    }
}
