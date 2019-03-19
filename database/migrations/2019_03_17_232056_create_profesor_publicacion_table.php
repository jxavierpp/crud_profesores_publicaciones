<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorPublicacionTable extends Migration
{
    public function up()
    {
        Schema::create('profesor_publicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesor_id')->unsigned();
            $table->foreign('profesor_id')->references('id')->on('profesores');
            $table->integer('publicacion_id')->unsigned();
            $table->foreign('publicacion_id')->references('id')->on('publicaciones');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesor_publicacion');
    }
}
