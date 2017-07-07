<?php

use Illuminate\Database\Seeder;

class ListaChamadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pacientes = \Famerp\Models\Paciente::all();
        factory(\Famerp\Models\ListaChamada::class, 20)
            ->create()->each(function($lista) use ($pacientes){
                $paciente = $pacientes->random();
                $lista->Paciente()->associate($paciente);
                $lista->save();
            });
    }
}

