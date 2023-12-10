<?php

namespace Database\Factories;

use App\Enums\FinalidadeModeloAvaliacaoEnum;
use App\Enums\SituacaoModeloAvaliacaoEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ModeloAvaliacao;

class ModeloAvaliacaoFactory extends Factory
{
    protected $model = ModeloAvaliacao::class;

    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'nome' => fake()->text('70'),
            'situacao' => SituacaoModeloAvaliacaoEnum::ATIVO,
            'finalidade' => fake()->randomElement(FinalidadeModeloAvaliacaoEnum::getValues()),
        ];
    }
}
