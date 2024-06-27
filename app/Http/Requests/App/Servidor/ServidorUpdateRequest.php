<?php

namespace App\Http\Requests\App\Servidor;

use Illuminate\Foundation\Http\FormRequest;

class ServidorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "uuid" => [
                "uuid", "exists:servidores,uuid"
            ],
            "nome" => [
                "required", "min:5", "max:254",
            ],
            "data_nascimento" => [
                "required", "date", "before_or_equal:today -16 years",
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            "data_nascimento.before_or_equal" => "A idade mínima permitida é de 16 anos.",
        ];
    }
}
