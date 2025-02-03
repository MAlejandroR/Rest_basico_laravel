<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;
    public $hidden=["id", "created_at", "updated_at"];
    public $fillable=["nombre","dni","email","fecha_nacimiento","apellido"];
}
