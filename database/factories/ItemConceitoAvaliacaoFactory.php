<?php

namespace Database\Factories;

use App\Models\ConceitoAvaliacao;
use App\Models\ItemConceitoAvaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemConceitoAvaliacaoFactory extends Factory
{
    protected $model = ItemConceitoAvaliacao::class;

    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'nome' => fake()->text(50),
            'pontuacao' => fake()->numberBetween(1, 10),
            'conceito_avaliacao_uuid' => ConceitoAvaliacao::inRandomOrder()->first()->uuid,
        ];
    }
}
