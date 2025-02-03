<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
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
            "nombre" => "required|string|max:50",
            "apellido" => "required|string|max:50",
            "dni"=>[
                "required",
                "string",
                "size:10",
                "unique:alumnos,dni",
                "regex:/^[0-9]{8}-[A-Z]$/"
                ],
            "email"=>"required|email|unique:alumnos,email",
            "fecha_nacimiento"=>"required|date|before:today"
        ];
    }
    public function messages(): array{
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.regex' => 'El DNI debe tener el formato 8 números, guion y una letra mayúscula (Ej: 12345678-A).',
            'dni.unique' => 'El DNI ya está registrado.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El formato del email no es válido.',
            'email.unique' => 'El email ya está registrado.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
        ];
    }
}
