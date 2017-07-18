<?php

use Illuminate\Database\Seeder;

class TurmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Famerp\Models\Turma::class, 2)->create();
    }
}
