<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function prioriteColor()
    {
        $priorite = $this->priorite;
        if($priorite == 1)
        {
            return "success";
        }

        if($priorite == 2)
        {
            return "warning";
        }

        if($priorite == 3)
        {
            return "danger";
        }
        return "secondary";
    }

    public function prioriteText()
    {
        $priorite = $this->priorite;
        if($priorite == 1)
        {
            return "Faible";
        }

        if($priorite == 2)
        {
            return "Moyen";
        }

        if($priorite == 3)
        {
            return "Prioritaire";
        }
        return "inconu";
    }
}
