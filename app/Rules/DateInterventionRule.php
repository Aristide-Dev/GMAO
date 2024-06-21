<?php

namespace App\Rules;

use Closure;
// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;

class DateInterventionRule implements Rule
{
    protected $demandeCreatedAt;

    public function __construct($demandeCreatedAt)
    {
        $this->demandeCreatedAt = $demandeCreatedAt;
    }

    public function passes($attribute, $value)
    {
        // Vérifie si la date_intervention est postérieure à $demande->created_at
        return strtotime($value) <= strtotime($this->demandeCreatedAt);
    }

    public function message()
    {
        return 'La date d\'intervention doit être superieur à la date de création de la demande. '.$this->demandeCreatedAt;
    }
}
