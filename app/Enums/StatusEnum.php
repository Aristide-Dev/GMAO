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
    case CLOTURE = 'Clôturé';
    case INJECTION_PIECE = 'injection de pièce';
    case PAS_TRAITE = 'pas traité';
    case AFFECTER_TRAVAUX = 'affectées travaux';

    /**
     * Associer les couleurs aux statuts
     */
    public static function getColor($status): string {
        return match ($status) {
            self::EN_ATTENTE => '#A16207', // Orange
            'en attente' => '#A16207', // Orange

            self::EN_COURS => '#FACC15', // Jaune
            'en cours' => '#FACC15', // Jaune

            self::ANNULE => '#991B1B', // Rouge
            'annulé' => '#991B1B', // Rouge

            self::AFFECTER_TRAVAUX => '#991B1B', // Rouge
            'affectées travaux' => '#991B1B', // Rouge

            self::TERMINE => '#166534', // Vert
            'terminé' => '#166534', // Vert

            self::CLOTURE => '#166534', // Vert
            'cloturé' => '#166534', // Vert
            'Clôturé' => '#166534', // Vert

            self::REJETE => '#F87171', // rouge-clair
            'rejeté' => '#F87171', // rouge-clair

            self::INJECTION_PIECE => '#800080', // Violet
            'injection de pièce' => '#800080', // Violet

            self::PAS_TRAITE => '#93C5FD', // Violet
            'pas traité' => '#93C5FD', // Violet

            default => '#D1D5DB', // gris par défaut => bg-gray-300 (tailwind)
        };
    }

    /**
     * Associer les couleurs aux types d'equipement
     */
    public static function getEquipementCategorieColor($categorie): string {
        return match ($categorie) {
            'distributeur' => '#3B82F6', // Rouge
            'stockage-et-tuyauterie' => '#9CA3AF', // gray-400
            'groupe-electrogene' => '#FACC15', // yellow-400
            'forage' => '#9A3412', // orange-800
            'servicing' => '#4B5563', // gray-600
            'branding' => '#4ADE80', // green-400
            'electricite' => '#EAB308', // yellow-500
            'equipement-incendie' => '#EF4444', // red-500
            default => '#D1D5DB', // gris par défaut => bg-gray-300 (tailwind)
        };
    }

    /**
     * Retourne une couleur CSS aléatoire
     */
    public static function randomColor(): string {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}
