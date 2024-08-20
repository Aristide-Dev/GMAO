<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'pdf_path'];

    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->pdf_path);
    }
}
