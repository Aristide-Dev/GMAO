<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoutMaintenanceReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'monthly_report_id',
        'site_id',
        'forfait_contrat',
        'cout_maintenance',
    ];

    public function MonthlyReport()
    {
        return $this->BelongsTo(MonthlyReport::class);
    }
}
