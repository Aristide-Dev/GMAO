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
            self::FAIBLE == '3' => 'FAIBLE',
            self::MOYEN == '2' => 'MOYEN',
            self::PRIORITAIRE == '1' => 'PRIORITAIRE',
            default => 'INCONNU',
        };
    }

    public static function getColor($urgence): string {
        // dd($urgence);
        return match ($urgence) {
            self::FAIBLE || '3' => 'danger', // Rouge
            self::MOYEN || '2' => 'warning', // Jaune
            self::PRIORITAIRE || '1' => 'success', // Vert
            default => 'info', // Blue ciel par défaut
        };
    }
}
