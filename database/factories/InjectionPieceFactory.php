<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InjectionPiece>
 */
class InjectionPieceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'piece_id' => \App\Models\Piece::factory(),
            'bon_travail_id' => \App\Models\BonTravail::factory(),
            'quantite' => $this->faker->numberBetween(1, 10),
            'take_in_stock' => $this->faker->boolean,
            'stock_price' => $this->faker->randomNumber(3),
            'take_in_fournisseur' => $this->faker->boolean,
            'fournisseur_name' => $this->faker->optional()->word,
            'fournisseur_price' => $this->faker->randomNumber(3),
            'injection_file' => $this->faker->optional()->imageUrl(),
        ];
    }
}
