<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Idioma;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private function storeIdiomasAlumno(Alumno $alumno, int $numero_idiomas)
    {
        $idiomas=collect(config("idiomas"))->shuffle()->take($numero_idiomas);
        $nivel=["Basico", "Medio", "Alto", "Bilingüe"];
        $titulo=[null, "A1", "A2", "B1", "B2", "C1", "C2"];

        $idiomas->each(fn($idioma) => $alumno->idiomas()->create([
            'idioma'=>$idioma,
            'titulo'=>collect($titulo)->random(),
            'nivel'=>collect($nivel)->random()
        ])
        );



    }

    public function run(): void
    {
        //


        Alumno::factory()->count(5)->create()->each(function (Alumno $alumno) {
            $numero_idiomas=rand(0, 4);//Cada alumno habla entre 0 y 4 idiomas
            if ($numero_idiomas > 0) {
                $this->storeIdiomasAlumno($alumno, $numero_idiomas);
            }
        });
    }
}
