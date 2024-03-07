<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Piece>
 */
class PieceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'piece' => $this->faker->word,
            'price' => $this->faker->randomNumber(2),
            'quantite' => $this->faker->numberBetween(0, 100),
            'stock_min' => $this->faker->numberBetween(0, 50),
        ];
    }
}
