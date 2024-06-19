<?php

namespace App\Enums;

enum ZonePrioriteEnum: string  {
    /**
     * Les types d'urgence statuts
     */
    case FAIBLE = '1';
    case MOYEN = '2';
    case PRIORITAIRE = '3';

    /**
     * Associer les couleurs aux statuts
     */
    public static function getText($urgence): string {
        // dd($urgence);
        return match ($urgence) {
            self::FAIBLE => 'FAIBLE',
            self::MOYEN => 'MOYEN',
            self::PRIORITAIRE => 'PRIORITAIRE',

            '1' => 'FAIBLE',
            '2' => 'MOYEN',
            '3' => 'PRIORITAIRE',

            default => 'INCONNU',
        };
    }

    public static function getColor($urgence): string {
        // dd($urgence);
        return match ($urgence) {
            self::FAIBLE => 'danger', // Rouge
            self::MOYEN => 'warning', // Jaune
            self::PRIORITAIRE => 'success', // Vert

            '1' => 'danger', // Rouge
            '2' => 'warning', // Jaune
            '3' => 'success', // Vert

            default => 'info', // Blue ciel par défaut
        };
    }
}
