<?php

namespace App\Http\Requests\App\IndicadorDesempenho;

use Illuminate\Foundation\Http\FormRequest;

class IndicadorDesempenhoStoreRequest extends FormRequest
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
            "descricao" => [
                "required", "string", "min:3", "max:254"
            ],
            "fator_avaliacao_uuid" => [
                "required", "uuid"
            ],
            "conceito_avaliacao_uuid" => [
                "required", "uuid"
            ],
            "modelo_avaliacao_uuid" => [
                "required", "uuid"
            ],
        ];
    }
}
