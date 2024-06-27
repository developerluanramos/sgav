<?php

namespace Database\Factories;

use App\Enums\CicloAvaliativoStatusEnum;
use App\Enums\CicloAvaliativoStepsEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CicloAvaliativo>
 */
class CicloAvaliativoFactory extends Factory
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
            "step" => CicloAvaliativoStepsEnum::PERIODICIDADE,
            "status" => CicloAvaliativoStatusEnum::RASCUNHO
        ];
    }
}
