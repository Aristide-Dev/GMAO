<?php

namespace App\Models;

use App\Enums\ZonePrioriteEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'priorite',
        'delais',
    ];

    public function bon_travails()
    {
        return $this->hasMany(BonTravail::class, 'zone_name', 'name');
    }

    public function prioriteText()
    {
        // return ZonePrioriteEnum::getText(ZonePrioriteEnum::FAIBLE);
        return ZonePrioriteEnum::getText($this->priorite);
    }


    public function prioriteColor()
    {
        // return ZonePrioriteEnum::getColor(ZonePrioriteEnum::FAIBLE);

        return ZonePrioriteEnum::getColor($this->priorite);
    }

    // public function prioriteColor($priorite=null)
    // {
    //     $priorite = $priorite ?? $this->priorite;
    //     if($priorite == 1)
    //     {
    //         return "success";
    //     }

    //     if($priorite == 2)
    //     {
    //         return "warning";
    //     }

    //     if($priorite == 3)
    //     {
    //         return "danger";
    //     }
    //     return "secondary";
    // }

    // public function prioriteText($priorite=null)
    // {
    //     $priorite = $priorite ?? $this->priorite;
    //     if($priorite == 1)
    //     {
    //         return "Faible";
    //     }

    //     if($priorite == 2)
    //     {
    //         return "Moyen";
    //     }

    //     if($priorite == 3)
    //     {
    //         return "Prioritaire";
    //     }
    //     return "inconu";
    // }
}
