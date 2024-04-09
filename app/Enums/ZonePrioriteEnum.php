<?php

namespace App\Enums;

enum ZonePrioriteEnum: string  {
    /**
     * Les types d'urgence statuts
     */
    case FAIBLE = '3';
    case MOYEN = '2';
    case PRIORITAIRE = '1';

    /**
     * Associer les couleurs aux statuts
     */
    public static function getText($urgence): string {
        // dd($urgence);
        return match ($urgence) {
            self::FAIBLE => 'FAIBLE',
            self::MOYEN => 'MOYEN',
            self::PRIORITAIRE => 'PRIORITAIRE',

            '3' => 'FAIBLE',
            '2' => 'MOYEN',
            '1' => 'PRIORITAIRE',

            default => 'INCONNU',
        };
    }

    public static function getColor($urgence): string {
        // dd($urgence);
        return match ($urgence) {
            self::FAIBLE => 'danger', // Rouge
            self::MOYEN => 'warning', // Jaune
            self::PRIORITAIRE => 'success', // Vert
            
            '3' => 'danger', // Rouge
            '2' => 'warning', // Jaune
            '1' => 'success', // Vert

            default => 'info', // Blue ciel par défaut
        };
    }
}
