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
            "uuid" => ["uuid", "exists:servidores,uuid"],
            'nome' => 'required|min:5|max:254',
            'email' => 'required|email|min:5|max:254',
            'data_nascimento' => 'required|date',
            'data_admissao' => 'required|date',
            'cargo_uuid' => 'required|exists:cargos,uuid',
            'equipe_uuid' => 'required|exists:equipes,uuid',
            'matricula' => 'required|min:5|max:50',
        ];
    }
}
