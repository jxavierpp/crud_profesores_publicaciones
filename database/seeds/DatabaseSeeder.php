<?php

use Illuminate\Database\Seeder;
use App\Profesor;
use App\Publicacion;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Profesor::class, 4)->create();

        factory(Publicacion::class, 4)->create()->each(function ($publicacion) {
            $publicacion->profesores()->attach([rand(1,4), rand(1,4)]);
        });
    }
}
