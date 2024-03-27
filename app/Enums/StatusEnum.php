<?php

namespace App\Enums;

enum StatusEnum: string {
    /**
     * Les statuts
     */
    case EN_ATTENTE = 'en attente';
    case EN_COURS = 'en cours';
    case ANNULE = 'annulé';
    case TERMINE = 'terminé';
    case REJETE = 'rejeté';
    case INJECTION_PIECE = 'injection de pièce';

    /**
     * Associer les couleurs aux statuts
     */
    public static function getColor($status): string {
        return match ($status) {
            self::EN_ATTENTE => '#F59E0B', // Orange
            'en attente' => '#F59E0B', // Orange

            self::EN_COURS => '#FCD34D', // Jaune
            'en cours' => '#FCD34D', // Jaune

            self::ANNULE => '#FF0000', // Rouge
            'annulé' => '#FF0000', // Rouge

            self::TERMINE => '#34D399', // Vert
            'terminé' => '#34D399', // Vert

            self::REJETE => '#FCA5A5', // rouge-clair
            'rejeté' => '#FCA5A5', // rouge-clair

            self::INJECTION_PIECE => '#800080', // Violet
            'injection de pièce' => '#800080', // Violet

            default => '#D1D5DB', // gris par défaut => bg-gray-300 (tailwind)
        };
    }
}
