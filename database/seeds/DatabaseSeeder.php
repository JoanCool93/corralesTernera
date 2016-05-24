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
        $this->call(DietasTableSeeder::class);
        $this->call(TratamientosTableSeeder::class);
        $this->call(SensoresTableSeeder::class);
        $this->call(RegistrosTableSeeder::class);
        $this->call(CriasTableSeeder::class);
        $this->call(SignosVitalesTableSeeder::class);
    }
}
