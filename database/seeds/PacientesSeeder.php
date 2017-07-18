<?php

use Illuminate\Database\Seeder;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turmas = \Famerp\Models\Turma::all();
        factory(\Famerp\Models\Paciente::class, 20)
            ->create()->each(function($lista) use ($turmas){
                $turma = $turmas->random();
                $lista->Turma()->associate($turma);
                $lista->save();
            });
    }
}
