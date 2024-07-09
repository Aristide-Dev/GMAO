<?php

namespace App\Rules;

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
        // Convertir la date de création de la demande en timestamp
        $demandeCreatedAtTimestamp = strtotime($this->demandeCreatedAt);

        // Convertir la date et l'heure d'intervention en timestamp
        $interventionTimestamp = strtotime($value);

        // Vérifie si la date et l'heure d'intervention sont postérieures à la date de création de la demande
        return $interventionTimestamp >= $demandeCreatedAtTimestamp;
    }

    public function message()
    {
        return 'La date et l\'heure d\'intervention doivent être supérieures à la date de création de la demande : ' . $this->demandeCreatedAt;
    }
}
