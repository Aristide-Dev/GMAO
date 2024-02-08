<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);


        Jetstream::role('admin', 'Administrateur', [
            'demande:create',
            'demande:list',
            'demande:read',
            'demande:update',
            'demande:delete',

            'bt:create',
            'bt:list',
            'bt:read',
            'bt:update',
            'bt:delete',

            'injection-piece:create',
            'injection-piece:list',
            'injection-piece:read',
            'injection-piece:update',
            'injection-piece:delete',

            'demande-cloture:create',
            'demande-cloture:list',
            'demande-cloture:read',
            'demande-cloture:update',
            'demande-cloture:delete',

            'site:create',
            'site:list',
            'site:read',
            'site:update',
            'site:delete',
            'site:add-equipement',

            'prestataire:create',
            'prestataire:list',
            'prestataire:read',
            'prestataire:update',
            'prestataire:delete',

            'user:create',
            'user:read',
            'user:update',
            'user:update-password',
            'user:reset-password',
            'user:delete',
        ])->description('Administrator users can perform many action.');

        Jetstream::role('maintenance', 'Service Maintenace', [

            'demande:create',
            'demande:list',
            'demande:read',
            'demande:update',
            'demande:delete',

            'bt:create',
            'bt:list',
            'bt:read',
            'bt:update',
            'bt:delete',

            'injection-piece:create',
            'injection-piece:list',
            'injection-piece:read',
            'injection-piece:update',
            'injection-piece:delete',

            'demande-cloture:create',
            'demande-cloture:list',
            'demande-cloture:read',
            'demande-cloture:update',
            'demande-cloture:delete',

            'site:create',
            'site:list',
            'site:read',
            'site:update',
            'site:delete',
            'site:add-equipement',

            'prestataire:create',
            'prestataire:list',
            'prestataire:read',
            'prestataire:update',
            'prestataire:delete',

            'user:create',
            'user:read',
        ])->description('Administrator users can perform any action.');

        Jetstream::role('demandeur', 'Demandeur', [
            'demande:create',
            'demande:list',
            'demande:read',
            'demande:update',
            'demande:delete',
            'site:read',
            'site:list',
        ])->description("Determine les autorisations par defaut d'un demandeur");

        Jetstream::role('prestataire-admin', 'Administrateur - Prestataire', [
            'demande:list',
            'demande:read',
            'demande:rapport-constat',
            'demande:rapport-injection',
            'demande:cloture',
            'agent:create',
            'agent:read',
            'agent:update',
            'agent:update-password',
            'agent:reset-password',
            'agent:reset-password',
            'agent:delete',
        ])->description("Determine les autorisations par defaut de l'admin d'un prestataire");

        Jetstream::role('agent', 'Agent', [
            'demande:list',
            'demande:read',
            'demande:rapport-constat',
            'demande:rapport-injection',
            'demande:cloture',
            'agent:read',
        ])->description("Determine les autorisations par defaut des agents d'un prestataire");
    }
}
