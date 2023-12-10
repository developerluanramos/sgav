<?php

namespace App\Http\Requests\App\ItemConceitoAvaliacao;

use Illuminate\Foundation\Http\FormRequest;

class ItemConceitoAvaliacaoUpdateRequest extends FormRequest
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
            // Defina as regras de validação aqui
            "uuid" => ["uuid", "exists:itens_conceitos_avaliacao,uuid"],
            "nome" => ["required", "min:5", "max:254"],
            "pontuacao" => ["required"]
        ];
    }
}
