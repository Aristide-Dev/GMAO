<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => "Aristide",
            'last_name' => "Gnimassou",
            'name' => "ArisTech",
            'email' => "aristide@yelema.tech",
            'telephone' => "620407236",
            'email_verified_at' => now(),
            'telephone_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => null,
            'profile_photo_path' => null,
            'current_team_id' => null,
            'prestataire_own' => null,
            'role' => "super_admin",
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Zone::factory(10)->create(); // Crée 10 entrées dans la table "zones"
        \App\Models\Piece::factory(20)->create(); // Crée 20 entrées dans la table "pieces"
        \App\Models\Prestataire::factory(5)->create(); // Crée 15 entrées dans la table "prestataires"
        \App\Models\Site::factory(10)->create(); // Crée 5 entrées dans la table "sites"
        \App\Models\DemandeIntervention::factory(100)->create(); // Crée 30 entrées dans la table "demande_interventions"
        \App\Models\BonTravail::factory(10)->create(); // Crée 25 entrées dans la table "bon_travails"
        \App\Models\InjectionPiece::factory(20)->create(); // Crée 50 entrées dans la table "injection_pieces"
    }
}
