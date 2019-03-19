<?php

use Faker\Generator as Faker;
use App\Profesor;

$factory->define(Profesor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'grado' => $faker->randomElement(['Licenciatura','Maestria', 'Doctorado']),
        'year' => '19'.$faker->randomNumber(2),
    ];
});
