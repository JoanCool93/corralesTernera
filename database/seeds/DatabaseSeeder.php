<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(CorralesTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
    }
}
