<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumnoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return ["id"        =>(string)$this->id,
                "type"      =>"Alumnos",
                "attributes"=>["id"              =>$this->id,
                               "nombre"          =>$this->nombre,
                               "apellido"        =>$this->apellido,
                               "dni"             =>$this->dni,
                               "email"           =>$this->email,
                               "fecha_nacimiento"=>$this->fecha_nacimiento],
                "links"     =>['self'=>url("alumnos/api/$this->id")]];


    }
}
