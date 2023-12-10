<?php

namespace App\Http\Requests\App\FatorAvaliacao;

use Illuminate\Foundation\Http\FormRequest;

class FatorAvaliacaoUpdateRequest extends FormRequest
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
            "uuid" => ["uuid", "exists:fatores_avaliacaos,uuid"],
            "nome" => ["required", "min:5", "max:254"],
            "conceito_avaliacao_uuid" => ["required", "exists:conceitos_avaliacao,uuid"],
        ];
    }
}
