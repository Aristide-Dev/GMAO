<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'year',
        'month',
        'validated',
    ];

    public function getTitleAttribute()
    {
        return Carbon::parse(Carbon::createFromFormat('m', $this->month))->translatedFormat('F').' '.$this->year;
    }

    public function evolution_requete_report()
    {
        return $this->hasOne(EvolutionRequeteReport::class);
    }

    public function top10_panne_report()
    {
        return $this->hasOne(Top10PanneReport::class);
    }

    public function request_by_equipement_type_report()
    {
        return $this->hasOne(RequestByEquipementTypeReport::class);
    }

    public function request_by_zone_report()
    {
        return $this->hasOne(RequestByZoneReport::class);
    }

    public function cout_maintenance_report()
    {
        return $this->hasOne(CoutMaintenanceReport::class);
    }
}
