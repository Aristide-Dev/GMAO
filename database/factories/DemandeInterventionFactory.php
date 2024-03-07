<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DemandeIntervention>
 */
class DemandeInterventionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reference = 'DI' . Str::padLeft($this->faker->unique()->randomNumber(7), 7, '0');

        return [
            'di_reference' => $reference,
            'site_id' => \App\Models\Site::factory(),
            'demandeur_id' => \App\Models\User::factory(),
            'demande_file' => $this->faker->optional()->imageUrl(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }


    private function generateDIReference()
    {
        // Récupérer le dernier enregistrement de DemandeIntervention
        $lastDemandeIntervention = \App\Models\DemandeIntervention::latest()->first();
    
        // Si aucun enregistrement n'existe, commencez à partir de 1
        if (!$lastDemandeIntervention) {
            return 'DI0000001'; // Initialiser avec le premier ID
        }
    
        // Extraire le numéro d'identification de la référence
        $lastReference = $lastDemandeIntervention->di_reference;
        $lastId = (int)substr($lastReference, 2); // Extrait les chiffres après "DI"
    
        // Incrémenter l'ID pour le prochain enregistrement
        $nextId = $lastId + 1;
    
        // Formater le numéro d'identification pour qu'il ait toujours 7 chiffres
        $formattedId = str_pad($nextId, 7, '0', STR_PAD_LEFT);
    
        // Retourner la référence complète
        return 'DI' . $formattedId;
    }
    
    
}
