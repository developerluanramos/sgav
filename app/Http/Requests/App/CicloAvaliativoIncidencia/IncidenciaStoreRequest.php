<?php

namespace App\Http\Requests\App\CicloAvaliativoIncidencia;

use Illuminate\Foundation\Http\FormRequest;

class IncidenciaStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "locais_trabalho" => [
                "required"
            ],
            "orgaos" => [
                "required"
            ],
            "funcoes" => [
                "required"
            ]
        ];
    }
}
