<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipement>
 */
class EquipementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'categorie' => $this->faker->name(),
            'numero_serie' => $this->faker->isbn13(),
            'forfait_contrat' => $this->faker->randomNumber(6,false), // 79907610,
            'site_id' => rand(1,30),
        ];
    }
}
