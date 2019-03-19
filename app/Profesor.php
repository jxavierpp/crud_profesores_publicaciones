<?php

namespace App;
use App\Publicacion;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';

    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class, 'profesor_publicacion');
    }
}
