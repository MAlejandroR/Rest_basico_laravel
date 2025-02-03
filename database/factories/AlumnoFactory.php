<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function getDni():string{
        $letras ="TRWAGMYFPDXBNJZSQVHLCKE";
        $numero = $this->faker->numberBetween(10000000,99999999);
        $dni = $numero . $letras[$numero%23];
        return $dni;
    }
    public function definition(): array
    {

        return ["nombre"          =>$this->faker->name(),
                "apellido"        =>$this->faker->lastName(),
                "email"           =>$this->faker->unique()->safeEmail(),
                "dni"             =>$this->getDni(),
                "fecha_nacimiento"=>$this->faker->date()
                ];

    }
}
