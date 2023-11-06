<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $situacaoValue = rand(0, 1) === 1 ? 1 : "0";

        return [
            'uuid' => fake()->uuid(),
            'name' => fake()->name(),
            'email' => fake()->email(),
            'situacao' => $situacaoValue,
        ];
    }
}
