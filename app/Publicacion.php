<?php

namespace App;
use App\Profesor;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    
    protected $appends = ['profesor_ids'];

    public function profesores()
    {
        return $this->belongsToMany(Profesor::class, 'profesor_publicacion');
    }
    public function getProfesoresIds()
    {
        return $this->profesores->pluck('id');
    }
}
