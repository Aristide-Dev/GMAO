<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use App\Actions\Jetstream\AddTeamMember;


use App\Models\Team;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Events\AddingTeamMember;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AppController extends Controller
{
    private $roles_list = ['super_admin','admin','maintenance','demandeur','prestataire_admin','Agent'];

    public function init()
    {
        $count_user = User::count();
        if($count_user > 0)
        {
            return redirect(route('welcome'))->with('error','You can not do this action');
        }
        $super_user = $this->create_super_user();
        return redirect(route('login'))->with('success','super admin created succefully');

        // $super_Admin_team = $this->createTeam($super_user, 'Super Admin');
        // $maintenance_team = $this->createTeam($super_user, 'Service Maintenace');
        // $demandeur_team = $this->createTeam($super_user, 'Demandeur');
        // $prestataire_team = $this->createTeam($super_user, 'Prestataire');

        // $super_user->switchTeam($super_Admin_team);
        
        // // dd($super_Admin_team);
        // $admin_role = Jetstream::role('super_admin', 'Super Admin', ['*:*',])
        // ->description('Super Admin users can perform any action.');
        // // dd($admin_role);

        // $newTeamMember = Jetstream::findUserByEmailOrFail($super_user->email);

        // $super_Admin_team->attach(
        //     $newTeamMember->id, ['role' => $admin_role]
        // );

        // $admin_role = Jetstream::role('admin', 'Administrateur', [
        //     'demande:create',
        //     'demande:list',
        //     'demande:read',
        //     'demande:update',
        //     'demande:delete',

        //     'bt:create',
        //     'bt:list',
        //     'bt:read',
        //     'bt:update',
        //     'bt:delete',

        //     'injection-piece:create',
        //     'injection-piece:list',
        //     'injection-piece:read',
        //     'injection-piece:update',
        //     'injection-piece:delete',

        //     'demande-cloture:create',
        //     'demande-cloture:list',
        //     'demande-cloture:read',
        //     'demande-cloture:update',
        //     'demande-cloture:delete',

        //     'site:create',
        //     'site:list',
        //     'site:read',
        //     'site:update',
        //     'site:delete',
        //     'site:add-equipement',

        //     'prestataire:create',
        //     'prestataire:list',
        //     'prestataire:read',
        //     'prestataire:update',
        //     'prestataire:delete',

        //     'user:create',
        //     'user:read',
        //     'user:update',
        //     'user:update-password',
        //     'user:reset-password',
        //     'user:delete',
        // ])->description('Administrator users can perform many action.');

        // $maintenance_role = Jetstream::role('maintenance', 'Service Maintenace', [

        //     'demande:create',
        //     'demande:list',
        //     'demande:read',
        //     'demande:update',
        //     'demande:delete',

        //     'bt:create',
        //     'bt:list',
        //     'bt:read',
        //     'bt:update',
        //     'bt:delete',

        //     'injection-piece:create',
        //     'injection-piece:list',
        //     'injection-piece:read',
        //     'injection-piece:update',
        //     'injection-piece:delete',

        //     'demande-cloture:create',
        //     'demande-cloture:list',
        //     'demande-cloture:read',
        //     'demande-cloture:update',
        //     'demande-cloture:delete',

        //     'site:create',
        //     'site:list',
        //     'site:read',
        //     'site:update',
        //     'site:delete',
        //     'site:add-equipement',

        //     'prestataire:create',
        //     'prestataire:list',
        //     'prestataire:read',
        //     'prestataire:update',
        //     'prestataire:delete',

        //     'user:create',
        //     'user:read',
        // ])->description('Administrator users can perform any action.');

        // $demandeur_role = Jetstream::role('demandeur', 'Demandeur', [
        //     'demande:create',
        //     'demande:list',
        //     'demande:read',
        //     'demande:update',
        //     'demande:delete',
        //     'site:read',
        //     'site:list',
        // ])->description("Determine les autorisations par defaut d'un demandeur");

        // $prestataire_admin_role = Jetstream::role('prestataire-admin', 'Administrateur - Prestataire', [
        //     'demande:list',
        //     'demande:read',
        //     'demande:rapport-constat',
        //     'demande:rapport-injection',
        //     'demande:cloture',
        //     'agent:create',
        //     'agent:read',
        //     'agent:update',
        //     'agent:update-password',
        //     'agent:reset-password',
        //     'agent:reset-password',
        //     'agent:delete',
        // ])->description("Determine les autorisations par defaut de l'admin d'un prestataire");

        // $agent_role = Jetstream::role('agent', 'Agent', [
        //     'demande:list',
        //     'demande:read',
        //     'demande:rapport-constat',
        //     'demande:rapport-injection',
        //     'demande:cloture',
        //     'agent:read',
        // ])->description("Determine les autorisations par defaut des agents d'un prestataire");
    }

    /**
     * Validate the add member operation.
     */
    protected function validated(Team $team, string $email, ?string $role): void
    {
        Validator::make([
            'email' => $email,
            'role' => $role,
        ], $this->rules(), [
            'email.exists' => __('We were unable to find a registered user with this email address.'),
        ])->after(
            $this->ensureUserIsNotAlreadyOnTeam($team, $email)
        )->validateWithBag('addTeamMember');
    }

    /**
     * Get the validation rules for adding a team member.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function rules(): array
    {
        return array_filter([
            'email' => ['required', 'email', 'exists:users'],
            'role' => Jetstream::hasRoles()
                            ? ['required', 'string', new Role]
                            : null,
        ]);
    }

    /**
     * Ensure that the user is not already on the team.
     */
    protected function ensureUserIsNotAlreadyOnTeam(Team $team, string $email): Closure
    {
        return function ($validator) use ($team, $email) {
            $validator->errors()->addIf(
                $team->hasUserWithEmail($email),
                'email',
                __('This user already belongs to the team.')
            );
        };
    }

    private function create_super_user($first_name="Aristide", $last_name="GNIMASSOU", $email="aristechdev@gmail.com", $telephone="620407236", String $password="P@ssword2024", $first_login=true, $status=1)
    {
        
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'name' => "ArisTech",
            'email' => $email,
            'telephone' => $telephone,
            'password' => Hash::make($password),
            'first_login' => $first_login,
            'status' => 1,
            'role' => "super_admin",
        ];
        $user = User::create($data);
        return $user;
        // return DB::transaction(function () use ($data) {
        //     $user = User::create([
        //         'first_name' => $data['first_name'],
        //         'last_name' => $data['last_name'],
        //         'name' => $data['name'],
        //         'email' => $data['email'],
        //         'telephone' => $data['telephone'],
        //         'password' => Hash::make($data['password']),
        //         'first_login' => true,
        //         'role' => "super_admin",
        //     ]);
        //     return $user;
        // });
    }

    /**
     * Create a personal team for the user.
     */
    private function createTeam(User $user, String $team_name)
    {
        $result = $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => $team_name,
            'personal_team' => false,
        ]));
        return $result;
    }
}
