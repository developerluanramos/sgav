<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VinculoAvaliacao>
 */
class VinculoAvaliacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid,
            'ciclos_avaliativos_uuid' => "29494afd-e6de-495d-be85-9b6eb6379fb4",
            'ciclos_uuid' => '27718bd4-7bd5-4a6b-879b-f2c486bfe3aa',
            'periodos_uuid' => 'f963071a-e158-4ab0-9728-bc3a028f7e5a',
            'avaliacoes_uuid' => 'e04faf5e-1fe5-402c-92f1-97cbf6c88773',
            'vinculos_uuid' => 'cc562918-4c37-4aa8-8c39-5a479771ab17'
        ];
    }
}
