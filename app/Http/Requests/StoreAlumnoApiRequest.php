<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "data.attributes.nombre" => "required|string|max:50",
            "data.attributes.apellido" => "required|string|max:50",
            "data.attributes.dni"=>[
                "required",
                "string",
                "size:10",
                "unique:alumnos,dni",
                "regex:/^[0-9]{8}-[A-Z]$/"
                ],
            "data.attributes.email"=>"required|email|unique:alumnos,email",
            "data.attributes.fecha_nacimiento"=>"required|date|before:today"
        ];
    }
    public function messages(): array{
        return [
            'data.attributes.nombre.required' => 'El nombre es obligatorio.',
            'data.attributes.apellido.required' => 'El apellido es obligatorio.',
            'data.attributes.dni.required' => 'El DNI es obligatorio.',
            'data.attributes.dni.regex' => 'El DNI debe tener el formato 8 números, guion y una letra mayúscula (Ej: 12345678-A).',
            'data.attributes.dni.unique' => 'El DNI ya está registrado.',
            'data.attributes.email.required' => 'El email es obligatorio.',
            'data.attributes.email.email' => 'El formato del email no es válido.',
            'data.attributes.email.unique' => 'El email ya está registrado.',
            'data.attributes.fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'data.attributes.fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'data.attributes.fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
        ];
    }
}
