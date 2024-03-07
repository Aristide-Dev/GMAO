<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zone>
 */
class ZoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'priorite' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'delais' => $this->faker->numberBetween(1, 30), // Exemple de délai aléatoire entre 1 et 30 jours
        ];
    }
}
