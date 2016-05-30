<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleTableSeeder extends Seeder{

    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }

        //DB::table('roles')->truncate();

        Role::create([
            'idRole'            => 1,
            'nombre'          => 'Root',
            'descripcion'   => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'
        ]);
        Role::create([
            'idRole'            => 2,
            'nombre'          => 'Administrador',
            'descripcion'   => 'Full access to create, edit, and update companies, and orders.'
        ]);
        Role::create([
            'idRole'            => 3,
            'nombre'          => 'Departamento de veterinaria',
            'descripcion'   => 'Ability to create new companies and orders, or edit and update any existing ones.'
        ]);
        Role::create([
            'idRole'            => 4,
            'nombre'          => 'Empleado',
            'descripcion'   => 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.'
        ]);
        Role::create([
            'idRole'            => 5,
            'nombre'          => 'Cliente',
            'descripcion'   => 'A standard user that can have a licence assigned to them. No administrative features.'
        ]);
    }
}