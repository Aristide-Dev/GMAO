<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    private $roles_list = ['super_admin','admin','maintenance','demandeur','prestataire_admin','agent'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'first_login',
        'email',
        'telephone',
        'password',
        'role',
        'prestataire_own',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'telephone_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function getRoleText()
    {
        $role = $this->role;
        if($role == 'super_admin')
        {
            return "Super Admin";
        }
        elseif($role == 'admin')
        {
            return "admin";
        }
        elseif($role == 'maintenance')
        {
            return "Service Maintenance";
        }
        elseif($role == 'demandeur')
        {
            return "Demandeur";
        }
        elseif($role == 'prestataire_admin')
        {
            return "Gerant";
        }
        elseif($role == 'agent')
        {
            return "Agent";
        }
        else{
            return "inconnu";
        }
    }

    public function abordIfNotAuthorized($role)
    {
        // dd($role,$this->role);
        if(empty($this->role))
        {
            abort(403, 'Unauthorized action. We need your Role');
            exit();
        }
        if (!in_array($this->role, $this->roles_list)) {
            abort(403, 'Unauthorized action.');
            exit();
        }

        if (is_array($role)) {
            if (!in_array($this->role, $role)) {
                abort(403, 'Unauthorized action.');
                exit();
            }
        } elseif (is_string($role)) {
            if ($this->role ==! $role) {
                abort(403, 'Unauthorized action.');
                exit();
            }
        }else{
            abort(403, 'Unauthorized action.');
            exit();
        }
    }

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'prestataire_own','id');
    }
}
