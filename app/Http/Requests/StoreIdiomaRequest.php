<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIdiomaRequest extends FormRequest
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
            "idioma" => "required|array",
            "idioma.*" => "string",
            "nivel" => "required|array",
            "nivel.*" => "in:Basico,Medio,Alto,Bilingüe",
            "titutlo" => "required|array",
            'titulo.*' => 'nullable|in:A1,A2,B1,B2,C1,C2', // Puede ser nulo o los valores permitidos

            //
        ];
    }
}
