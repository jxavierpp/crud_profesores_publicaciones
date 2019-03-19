<?php

use Faker\Generator as Faker;
use App\Publicacion;

$factory->define(Publicacion::class, function (Faker $faker) {
    return [
        'referencia' => $faker->randomElement(['Soñar con ovejas eléctricas',
                                                'Tecnologias emergentes aplicadas en la educación', 
                                                '¿Por qué comunicarse en formación a distancia?', 
                                                'La vigilancia tecnológica y estrategia cientifica responsable al servicio de la sociedad del conocimiento',
                                                'La Reforma de las Telecomunicaciones en México',
                                                'La socialización política en la Sociedad del Conocimiento'
                                                ]),
        'tipo' => $faker->randomElement(['Articulo','Revista']),
        'year' => '19'. $faker->randomNumber(2),
    ];
});
