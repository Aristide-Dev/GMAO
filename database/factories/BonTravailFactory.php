<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BonTravail>
 */
class BonTravailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bt_reference' => $this->faker->unique()->word,
            'requete' => $this->faker->sentence,
            'di_reference' => \App\Models\DemandeIntervention::factory()->create()->di_reference,
            'zone_name' => $this->faker->word,
            'zone_priorite' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'zone_delais' => $this->faker->numberBetween(1, 30),
            'equipement_id' => \App\Models\Equipement::factory()->create()->id,
            'prestataire_id' => \App\Models\Prestataire::factory()->create()->id,
            'last_prestataire_id' => null, // Vous devez ajuster cette valeur selon vos besoins
            'user_id' => \App\Models\User::factory()->create()->id,
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'canceled']),
        ];
    }
}
