<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $registres = ['B2B', 'CONTRAT', 'AUTRE'];
        return [
            'name' => $this->faker->unique()->company,
            'registre' => $registres[rand(0,2)],
            'actif' => $this->faker->boolean(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Site $site) {
            // Créer au moins 3 équipements pour chaque site
            \App\Models\Equipement::factory()->count(3)->create(['site_id' => $site->id]);
        });
    }
}
