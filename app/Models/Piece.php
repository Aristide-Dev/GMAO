<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'piece',
        'price',
        'quantite',
        'stock_min',
    ];

    public function alert_stock()
    {
        if(
            !is_null($this->quantite) && 
            !is_null($this->stock_min)
        ){
            if($this->quantite <= $this->stock_min)
            {
                return true;
            }
        }
        
    }
}
