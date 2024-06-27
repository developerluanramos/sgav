<?php

namespace Database\Factories;

use App\Enums\UnidadePeriodicidadeEnum;
use App\Models\CicloAvaliativo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodicidade>
 */
class PeriodicidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "uuid" => fake()->uuid(),
            "ciclos_avaliativos_uuid" => CicloAvaliativo::inRandomOrder()->first()->uuid,
            "iniciado_em" => fake()->date(),
            "quantidade_ciclos" => fake()->numberBetween(1, 10),
            "unidade_ciclos" => UnidadePeriodicidadeEnum::getRandomValue(),
            "quantidade_unidade_ciclos" => 2,
            "quantidade_periodos" => fake()->numberBetween(1, 10),
            "quantidade_unidade_periodos" => 4,
            "unidade_periodos" => UnidadePeriodicidadeEnum::getRandomValue(),
            "tolerancia_abertura_ciclo" => fake()->numberBetween(1, 10),
            "tolerancia_encerramento_ciclo" => fake()->numberBetween(1, 10),
            "tolerancia_abertura_periodo" => fake()->numberBetween(1, 10),
            "tolerancia_encerramento_periodo" => fake()->numberBetween(1, 10),
        ];
    }
}
