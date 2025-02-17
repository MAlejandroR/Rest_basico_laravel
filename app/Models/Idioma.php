<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    public function alumnos(){
        return $this->belongsTo(Alumno::class);
    }
    //
}
