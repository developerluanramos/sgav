<?php

namespace App\Http\Requests\App\VinculoAvaliacao;

use Illuminate\Foundation\Http\FormRequest;

class VinculoAvaliacaoStoreRequest extends FormRequest
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
        // dd(request()->vinculoUuid);
        return [
            "avaliacoes_uuid" => [
                'required', 
                \Illuminate\Validation\Rule::unique('vinculo_avaliacoes', 'avaliacoes_uuid')
                ->where('avaliacoes_uuid', $this->avaliacoes_uuid)
                ->where('vinculos_uuid', request()->vinculoUuid),
            ],
            "ciclos_uuid" => ['required'],
            "periodos_uuid" => ['required']
        ];
    }

    public function messages()
    {
        return [
            "avaliacoes_uuid.unique" => "Avaliação já foi realizada anteriormente"
        ];
    }
}
