<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Famerp\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\Famerp\Models\Paciente::class, function(Faker\Generator $faker){
    return [
        'Nome' => $faker->name,
        'NumeroCartaoSUS' => $faker->numberBetween(156545, 214748960),
        'Sexo' => rand(1,2) == 2 ? 'M' : 'F',
        'DataNascimento' => $faker->date(),
        'AvaliacaoAlterada' => rand(1,2) == 2 ? 1 : 0,
        'Peso' => rand(1,2) == 2 ? 75.5 : 150.0,
        'Altura' => rand(1,2) == 2 ? 1.90 : 1.50
    ];
});

$factory->define(\Famerp\Models\ListaChamada::class, function(Faker\Generator $faker){
    return [
        'Prontuario' => rand(1,3) == 1 ? $faker->word : '',
        'ID' => $faker->numberBetween(1, 32000),
        'Proc' => $faker->sentence(2),
        'CID' => $faker->numberBetween(1, 32000),
        'Observacao' => rand(1,4) == 1 ? $faker->sentence(20) : '',
        'PacienteID' => 1
    ];
});