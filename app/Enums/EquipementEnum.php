<?php

namespace App\Enums;

enum EquipementEnum: string {
    /**
     * Les types d'équipements
     */
    case DISTRIBUTEUR = 'distributeur';
    case STOCKAGE_ET_TUYAUTERIE = 'stockage-et-tuyauterie';
    case GROUPE_ELECTROGENE = 'groupe-electrogene';
    case FORAGE = 'forage';
    case SERVICING = 'servicing';
    case BRANDING = 'branding';
    case ELECTRICITE = 'electricite';
    case EQUIPEMENT_INCENDIE = 'equipement-incendie';
    case COMPTEUR_ET_POMPES_DE_TRANSFERT = 'compteur-et-pompes-de-transfert';

    /**
     * Associer les couleurs aux types d'équipement
     */
    public static function getColor($categorie): string {
        return match ($categorie) {
            self::DISTRIBUTEUR, 'distributeur' => '#3B82F6', // Bleu
            self::STOCKAGE_ET_TUYAUTERIE, 'stockage-et-tuyauterie' => '#9CA3AF', // Gris
            self::GROUPE_ELECTROGENE, 'groupe-electrogene' => '#ffc400', // Jaune
            self::FORAGE, 'forage' => '#9A3412', // Orange foncé
            self::SERVICING, 'servicing' => '#4B5563', // Gris foncé
            self::BRANDING, 'branding' => '#d805c6', // Violet
            self::ELECTRICITE, 'electricite' => '#ffff00', // Jaune foncé
            self::EQUIPEMENT_INCENDIE, 'equipement-incendie' => '#EF4444', // Rouge
            self::COMPTEUR_ET_POMPES_DE_TRANSFERT, 'compteur-et-pompes-de-transfert' => '#60A5FA', // Bleu-400
            default => '#D1D5DB', // Gris par défaut
        };
    }

    /**
     * Associer les textes aux types d'équipement
     */
    public static function getText($categorie): string {
        return match ($categorie) {
            self::DISTRIBUTEUR, 'distributeur' => 'Distributeur',
            self::STOCKAGE_ET_TUYAUTERIE, 'stockage-et-tuyauterie' => 'Stockage et Tuyauterie',
            self::GROUPE_ELECTROGENE, 'groupe-electrogene' => 'Groupe Électrogène',
            self::FORAGE, 'forage' => 'Forage',
            self::SERVICING, 'servicing' => 'Servicing',
            self::BRANDING, 'branding' => 'Branding',
            self::ELECTRICITE, 'electricite' => 'Électricité',
            self::EQUIPEMENT_INCENDIE, 'equipement-incendie' => 'Équipement Incendie',
            self::COMPTEUR_ET_POMPES_DE_TRANSFERT, 'compteur-et-pompes-de-transfert' => 'Compteur et Pompes de transfert',
            default => 'Inconnu',
        };
    }

    /**
     * Retourne une couleur CSS aléatoire
     */
    public static function randomColor(): string {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}
