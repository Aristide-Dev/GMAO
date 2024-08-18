<?php

namespace App\Enums;

enum StatusEnum: string {
    /**
     * Les statuts
     */
    case EN_ATTENTE = 'en attente prestataire';
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
            self::EN_ATTENTE => '#f97316', // Orange
            'en attente prestataire' => '#f97316', // Orange

            self::EN_COURS => '#fbbf24', // Jaune
            'en cours' => '#fbbf24', // Jaune

            self::ANNULE => '#991B1B', // Rouge
            'annulé' => '#991B1B', // Rouge

            self::AFFECTER_TRAVAUX => '#EC4899', // pink-500
            'affectées travaux' => '#EC4899', // pink-500

            self::TERMINE => '#22c55e', // Vert
            'terminé' => '#22c55e', // Vert

            self::CLOTURE => '#22c55e', // Vert
            'cloturé' => '#22c55e', // Vert
            'Clôturé' => '#22c55e', // Vert

            self::REJETE => '#F87171', // rouge-clair
            'rejeté' => '#F87171', // rouge-clair

            self::INJECTION_PIECE => '#a21caf', // Violet
            'injection de pièce' => '#a21caf', // Violet

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
