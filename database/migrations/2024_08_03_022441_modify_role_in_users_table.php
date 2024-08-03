<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Détecter le type de base de données
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            // Pour MySQL
            DB::statement("ALTER TABLE users MODIFY role ENUM('super_admin', 'admin', 'maintenance', 'demandeur', 'prestataire_admin', 'agent', 'commercial') NOT NULL");
        } elseif ($driver === 'sqlite') {
            // Pour SQLite
            Schema::create('users_temp', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('name')->nullable();
                $table->string('email')->unique();
                $table->string('telephone')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->timestamp('telephone_verified_at')->nullable();
                $table->string('password');
                $table->text('two_factor_secret')->nullable();
                $table->text('two_factor_recovery_codes')->nullable();
                $table->timestamp('two_factor_confirmed_at')->nullable();
                $table->rememberToken();
                $table->foreignId('current_team_id')->nullable();
                $table->string('profile_photo_path', 2048)->nullable();
                $table->boolean("first_login")->default(true);
                $table->enum("role", ['super_admin', 'admin', 'maintenance', 'demandeur', 'prestataire_admin', 'agent', 'commercial']);
                $table->boolean('status')->default(false);
                $table->foreignId('prestataire_own')->nullable();
                $table->timestamps();
            });

            // Copier les données de la table modifiée vers l'ancienne structure
            DB::table('users_temp')->insert(DB::table('users')->select('*')->get()->toArray());

            // Supprimer la table modifiée
            Schema::dropIfExists('users');

            // Renommer la table temporaire
            Schema::rename('users_temp', 'users');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            // Revenir à l'ancien ENUM pour MySQL
            DB::statement("ALTER TABLE users MODIFY role ENUM('super_admin', 'admin', 'maintenance', 'demandeur', 'prestataire_admin', 'agent') NOT NULL");
        } elseif ($driver === 'sqlite') {
            // Pour SQLite, inverser la migration
            Schema::create('users_temp', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('name')->nullable();
                $table->string('email')->unique();
                $table->string('telephone')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->timestamp('telephone_verified_at')->nullable();
                $table->string('password');
                $table->text('two_factor_secret')->nullable();
                $table->text('two_factor_recovery_codes')->nullable();
                $table->timestamp('two_factor_confirmed_at')->nullable();
                $table->rememberToken();
                $table->foreignId('current_team_id')->nullable();
                $table->string('profile_photo_path', 2048)->nullable();
                $table->boolean("first_login")->default(true);
                $table->enum("role", ['super_admin', 'admin', 'maintenance', 'demandeur', 'prestataire_admin', 'agent']);
                $table->boolean('status')->default(false);
                $table->foreignId('prestataire_own')->nullable();
                $table->timestamps();
            });

            // Copier les données de la table modifiée vers l'ancienne structure
            DB::table('users_temp')->insert(DB::table('users')->select('*')->get()->toArray());

            // Supprimer la table modifiée
            Schema::dropIfExists('users');

            // Renommer la table temporaire
            Schema::rename('users_temp', 'users');
        }
    }
};
