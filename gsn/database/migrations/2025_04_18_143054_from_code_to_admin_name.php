<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admin_name', function (Blueprint $table) {
            //

            DB::statement("UPDATE `attributes` SET `code` = 'SKU' WHERE `attributes`.`id` = 1;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nom' WHERE `attributes`.`id` = 2;");

            DB::statement("UPDATE `attributes` SET `code` = 'Clé d\'URL' WHERE `attributes`.`id` = 3;");

            DB::statement("UPDATE `attributes` SET `code` = 'Visible individuellement' WHERE `attributes`.`id` = 7;");

            DB::statement("UPDATE `attributes` SET `code` = 'Actif' WHERE `attributes`.`id` = 8;");

            DB::statement("UPDATE `attributes` SET `code` = 'Brève description' WHERE `attributes`.`id` = 9;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prix' WHERE `attributes`.`id` = 11;");

            DB::statement("UPDATE `attributes` SET `code` = 'Coût' WHERE `attributes`.`id` = 12;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prix spécial' WHERE `attributes`.`id` = 13;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prix spécial (à partir de)' WHERE `attributes`.`id` = 14;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prix spécial (jusqu\'à)' WHERE `attributes`.`id` = 15;");

            DB::statement("UPDATE `attributes` SET `code` = 'Méta-titre' WHERE `attributes`.`id` = 16;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mots-clés méta' WHERE `attributes`.`id` = 17;");

            DB::statement("UPDATE `attributes` SET `code` = 'Méta-description' WHERE `attributes`.`id` = 18;");

            DB::statement("UPDATE `attributes` SET `code` = 'Longueur' WHERE `attributes`.`id` = 19;");

            DB::statement("UPDATE `attributes` SET `code` = 'Largeur' WHERE `attributes`.`id` = 20;");

            DB::statement("UPDATE `attributes` SET `code` = 'Hauteur' WHERE `attributes`.`id` = 21;");

            DB::statement("UPDATE `attributes` SET `code` = 'Poids' WHERE `attributes`.`id` = 22;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des stocks' WHERE `attributes`.`id` = 28;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapprochement bancaire et lettrage' WHERE `attributes`.`id` = 32;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module de facturation compatible facturation électronique' WHERE `attributes`.`id` = 37;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de l\'IR' WHERE `attributes`.`id` = 39;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des notes de frais' WHERE `attributes`.`id` = 40;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module OCR intégré' WHERE `attributes`.`id` = 41;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de secteurs particuliers (BTP, associations, ...) , Si oui lesquels ?' WHERE `attributes`.`id` = 43;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prévisionnels de budget' WHERE `attributes`.`id` = 46;");

            DB::statement("UPDATE `attributes` SET `code` = 'Utilise un RPA (Robotic Process Automation)' WHERE `attributes`.`id` = 51;");

            DB::statement("UPDATE `attributes` SET `code` = 'Intègre une solution IA' WHERE `attributes`.`id` = 52;");

            DB::statement("UPDATE `attributes` SET `code` = 'Intègre une solution IA , Si oui, laquelle ?' WHERE `attributes`.`id` = 53;");

            DB::statement("UPDATE `attributes` SET `code` = 'API disponibles, si oui, lesquelles ?' WHERE `attributes`.`id` = 55;");

            DB::statement("UPDATE `attributes` SET `code` = 'Intégration bureautique type Excel ou Power BI' WHERE `attributes`.`id` = 60;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel de facturation , Si oui lesquels ?' WHERE `attributes`.`id` = 62;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec des PDP , Si oui lesquelles ?' WHERE `attributes`.`id` = 64;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel d\'achat , Si oui lesquels ?' WHERE `attributes`.`id` = 67;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un système de conservation ou d\'archivage , Si oui lesquelles ?' WHERE `attributes`.`id` = 70;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un coffre-fort, Si oui lesquels ?' WHERE `attributes`.`id` = 72;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un CRM / GRC , Si oui lesquels ?' WHERE `attributes`.`id` = 74;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec des solutions métier , Si oui lesquelles ?' WHERE `attributes`.`id` = 76;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mise à jour avec les nouvelles règlementations , Si oui, quelle fréquence' WHERE `attributes`.`id` = 79;");

            DB::statement("UPDATE `attributes` SET `code` = 'Hébergement des données en  UE' WHERE `attributes`.`id` = 82;");

            DB::statement("UPDATE `attributes` SET `code` = 'Plan de récupération en cas de cyber attaque , si oui décrire' WHERE `attributes`.`id` = 84;");

            DB::statement("UPDATE `attributes` SET `code` = 'Hotline, si oui horaires.' WHERE `attributes`.`id` = 87;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des temps de travail' WHERE `attributes`.`id` = 101;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des carrières et entretiens' WHERE `attributes`.`id` = 104;");

            DB::statement("UPDATE `attributes` SET `code` = 'Bilan social' WHERE `attributes`.`id` = 106;");

            DB::statement("UPDATE `attributes` SET `code` = 'Modèle de paie par catégories de salariés' WHERE `attributes`.`id` = 107;");

            DB::statement("UPDATE `attributes` SET `code` = 'Déclaration préalable à l\'embauche' WHERE `attributes`.`id` = 108;");

            DB::statement("UPDATE `attributes` SET `code` = 'Coffre-fort électronique et archivage électronique des bulletins de paie' WHERE `attributes`.`id` = 111;");

            DB::statement("UPDATE `attributes` SET `code` = 'Démarrage des dossiers en cours d\'année (import de DSN)' WHERE `attributes`.`id` = 120;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre de conventions collectives gérées' WHERE `attributes`.`id` = 121;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de régimes spéciaux , Si oui, lesquels ?' WHERE `attributes`.`id` = 123;");

            DB::statement("UPDATE `attributes` SET `code` = 'Import de données , Si oui quels formats ?' WHERE `attributes`.`id` = 127;");

            DB::statement("UPDATE `attributes` SET `code` = 'Génération des écritures comptables de Paie , Si oui, quels formats ?' WHERE `attributes`.`id` = 131;");

            DB::statement("UPDATE `attributes` SET `code` = 'Génération des écritures comptables de Paie' WHERE `attributes`.`id` = 132;");

            DB::statement("UPDATE `attributes` SET `code` = 'Années de conservation de l\'historique' WHERE `attributes`.`id` = 134;");

            DB::statement("UPDATE `attributes` SET `code` = 'Hébergement des données en UE' WHERE `attributes`.`id` = 138;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prérequis' WHERE `attributes`.`id` = 152;");

            DB::statement("UPDATE `attributes` SET `code` = 'Solution logicielle ? Si non, précisez le type de solution ?' WHERE `attributes`.`id` = 155;");

            DB::statement("UPDATE `attributes` SET `code` = 'Fonction principale de la solution' WHERE `attributes`.`id` = 156;");

            DB::statement("UPDATE `attributes` SET `code` = 'Présentation de la solution' WHERE `attributes`.`id` = 157;");

            DB::statement("UPDATE `attributes` SET `code` = 'Importation et exploitation d\'Open data' WHERE `attributes`.`id` = 159;");

            DB::statement("UPDATE `attributes` SET `code` = 'Datavisualisation / tableaux de bord' WHERE `attributes`.`id` = 160;");

            DB::statement("UPDATE `attributes` SET `code` = 'Comparaison sectorielle' WHERE `attributes`.`id` = 161;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapports personnalisables' WHERE `attributes`.`id` = 163;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module prédictif' WHERE `attributes`.`id` = 166;");

            DB::statement("UPDATE `attributes` SET `code` = 'API push (export de données)' WHERE `attributes`.`id` = 169;");

            DB::statement("UPDATE `attributes` SET `code` = 'API pull (import de données externes)' WHERE `attributes`.`id` = 170;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interconnexions à des sources de données' WHERE `attributes`.`id` = 172;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interconnexions à des sources de données , Si Oui, lesquelles ?' WHERE `attributes`.`id` = 173;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des clients' WHERE `attributes`.`id` = 175;");

            DB::statement("UPDATE `attributes` SET `code` = 'Historique des interactions' WHERE `attributes`.`id` = 178;");

            DB::statement("UPDATE `attributes` SET `code` = 'Relance automatique des tâches' WHERE `attributes`.`id` = 180;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des devis' WHERE `attributes`.`id` = 181;");

            DB::statement("UPDATE `attributes` SET `code` = 'Création des factures' WHERE `attributes`.`id` = 182;");

            DB::statement("UPDATE `attributes` SET `code` = 'Factures au format facture électronique' WHERE `attributes`.`id` = 183;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des paiements' WHERE `attributes`.`id` = 184;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des temps' WHERE `attributes`.`id` = 195;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion multi sites' WHERE `attributes`.`id` = 198;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel de comptabilité' WHERE `attributes`.`id` = 204;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel de comptabilité , Si oui, Lesquels ?' WHERE `attributes`.`id` = 205;");

            DB::statement("UPDATE `attributes` SET `code` = 'Extra-financier' WHERE `attributes`.`id` = 207;");

            DB::statement("UPDATE `attributes` SET `code` = 'Bilan Carbone' WHERE `attributes`.`id` = 208;");

            DB::statement("UPDATE `attributes` SET `code` = 'Démarche RSE' WHERE `attributes`.`id` = 209;");

            DB::statement("UPDATE `attributes` SET `code` = 'Emission de Gaz à effet de serre' WHERE `attributes`.`id` = 210;");

            DB::statement("UPDATE `attributes` SET `code` = 'Labellisation' WHERE `attributes`.`id` = 211;");

            DB::statement("UPDATE `attributes` SET `code` = 'CSRD' WHERE `attributes`.`id` = 212;");

            DB::statement("UPDATE `attributes` SET `code` = 'CSRD Volontaire' WHERE `attributes`.`id` = 213;");

            DB::statement("UPDATE `attributes` SET `code` = 'Finance durable' WHERE `attributes`.`id` = 214;");

            DB::statement("UPDATE `attributes` SET `code` = 'Eco-organismes' WHERE `attributes`.`id` = 215;");

            DB::statement("UPDATE `attributes` SET `code` = 'Contrôle des FEC' WHERE `attributes`.`id` = 225;");

            DB::statement("UPDATE `attributes` SET `code` = 'Génération automatisée du compte-rendu de mission' WHERE `attributes`.`id` = 226;");

            DB::statement("UPDATE `attributes` SET `code` = 'Importation de la liasse fiscale' WHERE `attributes`.`id` = 229;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des formalités juridiques (création / modification)' WHERE `attributes`.`id` = 232;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des AG' WHERE `attributes`.`id` = 233;");

            DB::statement("UPDATE `attributes` SET `code` = 'Recouvrement de créances' WHERE `attributes`.`id` = 235;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rédaction, analyse de documents juridiques' WHERE `attributes`.`id` = 236;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des contrats' WHERE `attributes`.`id` = 239;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des contrats , Si oui type de contrats ?' WHERE `attributes`.`id` = 240;");

            DB::statement("UPDATE `attributes` SET `code` = 'Génération des lettres de mission' WHERE `attributes`.`id` = 241;");

            DB::statement("UPDATE `attributes` SET `code` = 'Création ou transformation d\'une facture au format Factur-X' WHERE `attributes`.`id` = 242;");

            DB::statement("UPDATE `attributes` SET `code` = 'Permet l\'émission et la réception de factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis).' WHERE `attributes`.`id` = 245;");

            DB::statement("UPDATE `attributes` SET `code` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...)' WHERE `attributes`.`id` = 246;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module de saisie en ligne des factures disponible pour les clients du cabinet' WHERE `attributes`.`id` = 247;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires' WHERE `attributes`.`id` = 248;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires, si oui, lesquels ?' WHERE `attributes`.`id` = 249;");

            DB::statement("UPDATE `attributes` SET `code` = 'Peut envoyer et recevoir des factures électroniques sous des formats autres que ceux du Socle minimal ,Si oui, lesquels ?' WHERE `attributes`.`id` = 250;");

            DB::statement("UPDATE `attributes` SET `code` = 'Service de paiement disponible' WHERE `attributes`.`id` = 251;");

            DB::statement("UPDATE `attributes` SET `code` = 'Cible visée (GE / ETI / PME / TPE / international)' WHERE `attributes`.`id` = 253;");

            DB::statement("UPDATE `attributes` SET `code` = 'Sur les 36 cas d\'usage décrits initialement dans les specifications, combien en gère la PDP ?' WHERE `attributes`.`id` = 254;");

            DB::statement("UPDATE `attributes` SET `code` = 'Service d\'archivage des factures intégré' WHERE `attributes`.`id` = 256;");

            DB::statement("UPDATE `attributes` SET `code` = 'Signature / scellement des factures électroniques' WHERE `attributes`.`id` = 257;");

            DB::statement("UPDATE `attributes` SET `code` = 'Signature / scellement des factures électroniques intégré, si oui, la solution utilisée.' WHERE `attributes`.`id` = 258;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel) ' WHERE `attributes`.`id` = 259;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel) , Si non, lesquelles sont assurées ?' WHERE `attributes`.`id` = 260;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre de PDP interfacées avec la PDP' WHERE `attributes`.`id` = 262;");

            DB::statement("UPDATE `attributes` SET `code` = 'Votre PDP est point d\'accès PEPPOL' WHERE `attributes`.`id` = 264;");

            DB::statement("UPDATE `attributes` SET `code` = 'Intégration comptable, si oui avec quels éditeurs ?' WHERE `attributes`.`id` = 266;");

            DB::statement("UPDATE `attributes` SET `code` = 'Inscription sur la liste des immatriculations provisoires PDP de la DGFiP' WHERE `attributes`.`id` = 267;");

            DB::statement("UPDATE `attributes` SET `code` = 'Bilan patrimonial' WHERE `attributes`.`id` = 268;");

            DB::statement("UPDATE `attributes` SET `code` = 'Projections' WHERE `attributes`.`id` = 269;");

            DB::statement("UPDATE `attributes` SET `code` = 'Simulation fiscale' WHERE `attributes`.`id` = 270;");

            DB::statement("UPDATE `attributes` SET `code` = 'Simulation succession' WHERE `attributes`.`id` = 274;");

            DB::statement("UPDATE `attributes` SET `code` = 'Diagnostic Retraite' WHERE `attributes`.`id` = 276;");

            DB::statement("UPDATE `attributes` SET `code` = 'Reporting sur la santé financière de l\'entreprise' WHERE `attributes`.`id` = 278;");

            DB::statement("UPDATE `attributes` SET `code` = 'Anticipation des risques financiers' WHERE `attributes`.`id` = 279;");

            DB::statement("UPDATE `attributes` SET `code` = 'Synchronisation bancaire' WHERE `attributes`.`id` = 282;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapprochement bancaire' WHERE `attributes`.`id` = 284;");

            DB::statement("UPDATE `attributes` SET `code` = 'Flux de caisse' WHERE `attributes`.`id` = 285;");

            DB::statement("UPDATE `attributes` SET `code` = 'Relances clients' WHERE `attributes`.`id` = 292;");

            DB::statement("UPDATE `attributes` SET `code` = 'Emission des règlements ' WHERE `attributes`.`id` = 294;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel comptable' WHERE `attributes`.`id` = 299;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel comptable, Si oui, lesquels ?' WHERE `attributes`.`id` = 300;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel de gestion / caisse' WHERE `attributes`.`id` = 301;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel de gestion / caisse , Si oui, lesquels ?' WHERE `attributes`.`id` = 302;");

            DB::statement("UPDATE `attributes` SET `code` = 'Solution d\'archivage électronique (SAE)' WHERE `attributes`.`id` = 303;");

            DB::statement("UPDATE `attributes` SET `code` = 'Solution d\'archivage électronique à valeur probante' WHERE `attributes`.`id` = 304;");

            DB::statement("UPDATE `attributes` SET `code` = 'Solution de signature électronique' WHERE `attributes`.`id` = 305;");

            DB::statement("UPDATE `attributes` SET `code` = 'Niveau de signature' WHERE `attributes`.`id` = 306;");

            DB::statement("UPDATE `attributes` SET `code` = 'Modalité de collecte' WHERE `attributes`.`id` = 307;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre maximum de documents par collecte' WHERE `attributes`.`id` = 308;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre maximum de signataires par collecte' WHERE `attributes`.`id` = 309;");

            DB::statement("UPDATE `attributes` SET `code` = 'Formats des documents à signer' WHERE `attributes`.`id` = 310;");

            DB::statement("UPDATE `attributes` SET `code` = 'Télétransmissions fiscales' WHERE `attributes`.`id` = 311;");

            DB::statement("UPDATE `attributes` SET `code` = 'Télétransmissions sociales' WHERE `attributes`.`id` = 312;");

            DB::statement("UPDATE `attributes` SET `code` = 'Récupération des relevés bancaires' WHERE `attributes`.`id` = 313;");

            DB::statement("UPDATE `attributes` SET `code` = 'Certifié eIDAS' WHERE `attributes`.`id` = 315;");

            DB::statement("UPDATE `attributes` SET `code` = 'Comptabilité générale' WHERE `attributes`.`id` = 316;");

            DB::statement("UPDATE `attributes` SET `code` = 'Comptabilité analytique' WHERE `attributes`.`id` = 317;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module de paiement automatique' WHERE `attributes`.`id` = 318;");

            DB::statement("UPDATE `attributes` SET `code` = 'Cachet qualifié ou Signature électronique' WHERE `attributes`.`id` = 319;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de la paie' WHERE `attributes`.`id` = 320;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des cotisations TNS' WHERE `attributes`.`id` = 321;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des immobilisations' WHERE `attributes`.`id` = 322;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de secteurs particuliers (BTP, associations, ...)' WHERE `attributes`.`id` = 323;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module de datavisualisation de données paramétrable' WHERE `attributes`.`id` = 325;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prévisionnels CA' WHERE `attributes`.`id` = 326;");

            DB::statement("UPDATE `attributes` SET `code` = 'Prévisionnels de trésorerie' WHERE `attributes`.`id` = 327;");

            DB::statement("UPDATE `attributes` SET `code` = 'Analyses prédictives' WHERE `attributes`.`id` = 328;");

            DB::statement("UPDATE `attributes` SET `code` = 'Accès par le client à son dossier' WHERE `attributes`.`id` = 329;");

            DB::statement("UPDATE `attributes` SET `code` = 'API disponibles' WHERE `attributes`.`id` = 330;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel de facturation' WHERE `attributes`.`id` = 331;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec des PDP' WHERE `attributes`.`id` = 332;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un logiciel d\'achat' WHERE `attributes`.`id` = 333;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de l\'EBICS' WHERE `attributes`.`id` = 334;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un système de conservation ou d\'archivage' WHERE `attributes`.`id` = 335;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un coffre-fort' WHERE `attributes`.`id` = 336;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec un CRM / GRC' WHERE `attributes`.`id` = 337;");

            DB::statement("UPDATE `attributes` SET `code` = 'Interopérable avec des solutions métier' WHERE `attributes`.`id` = 338;");

            DB::statement("UPDATE `attributes` SET `code` = 'Conforme RGPD' WHERE `attributes`.`id` = 339;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mise à jour avec les nouvelles règlementations' WHERE `attributes`.`id` = 340;");

            DB::statement("UPDATE `attributes` SET `code` = 'Accès cloud' WHERE `attributes`.`id` = 341;");

            DB::statement("UPDATE `attributes` SET `code` = 'Plan de récupération en cas de cyberattaque' WHERE `attributes`.`id` = 342;");

            DB::statement("UPDATE `attributes` SET `code` = 'Hotline' WHERE `attributes`.`id` = 343;");

            DB::statement("UPDATE `attributes` SET `code` = 'Chat bot' WHERE `attributes`.`id` = 344;");

            DB::statement("UPDATE `attributes` SET `code` = 'Formation des utilisateurs' WHERE `attributes`.`id` = 345;");

            DB::statement("UPDATE `attributes` SET `code` = 'Coût de maintenance inclus' WHERE `attributes`.`id` = 346;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mises à jour gratuites' WHERE `attributes`.`id` = 347;");

            DB::statement("UPDATE `attributes` SET `code` = 'Fait partie d\'une suite logicielle' WHERE `attributes`.`id` = 348;");

            DB::statement("UPDATE `attributes` SET `code` = 'Import de données' WHERE `attributes`.`id` = 349;");

            DB::statement("UPDATE `attributes` SET `code` = 'Transmission à la DGFiP' WHERE `attributes`.`id` = 351;");

            DB::statement("UPDATE `attributes` SET `code` = 'Traitement simultané de plusieurs dossiers' WHERE `attributes`.`id` = 352;");

            DB::statement("UPDATE `attributes` SET `code` = 'Détection des anomalies' WHERE `attributes`.`id` = 353;");

            DB::statement("UPDATE `attributes` SET `code` = 'Format du CRM' WHERE `attributes`.`id` = 354;");

            DB::statement("UPDATE `attributes` SET `code` = 'Dépôt des comptes' WHERE `attributes`.`id` = 355;");

            DB::statement("UPDATE `attributes` SET `code` = 'Base documentaire juridique' WHERE `attributes`.`id` = 356;");

            DB::statement("UPDATE `attributes` SET `code` = 'Base documentaire fiscale' WHERE `attributes`.`id` = 357;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des participation et intéressement' WHERE `attributes`.`id` = 358;");

            DB::statement("UPDATE `attributes` SET `code` = 'Duplication d\'éléments (fiche salarié, rubrique de paie, ...)' WHERE `attributes`.`id` = 359;");

            DB::statement("UPDATE `attributes` SET `code` = 'Statistiques et tableaux de bord personnalisés' WHERE `attributes`.`id` = 360;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de la fonction publique' WHERE `attributes`.`id` = 361;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion du flux DSN' WHERE `attributes`.`id` = 362;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des DSN mensuelles' WHERE `attributes`.`id` = 363;");

            DB::statement("UPDATE `attributes` SET `code` = 'Contrôle et assistance aux zones de saisie obligatoires en DSN' WHERE `attributes`.`id` = 364;");

            DB::statement("UPDATE `attributes` SET `code` = 'Aide a la correction des erreurs declaratives des DSN avant envoi du flux' WHERE `attributes`.`id` = 365;");

            DB::statement("UPDATE `attributes` SET `code` = 'Saisie décentralisée des variables de paie du mois avec report sur le suivant' WHERE `attributes`.`id` = 366;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des utilisateurs et de leurs droits d\'accès' WHERE `attributes`.`id` = 367;");

            DB::statement("UPDATE `attributes` SET `code` = 'Saisie des évènements par les clients' WHERE `attributes`.`id` = 368;");

            DB::statement("UPDATE `attributes` SET `code` = 'Paramétrage par l\'utilisateur des lignes du bulletin de paie' WHERE `attributes`.`id` = 369;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de régimes spéciaux ' WHERE `attributes`.`id` = 370;");

            DB::statement("UPDATE `attributes` SET `code` = 'Double accès cabinet et client' WHERE `attributes`.`id` = 371;");

            DB::statement("UPDATE `attributes` SET `code` = 'Création de modèles de données' WHERE `attributes`.`id` = 372;");

            DB::statement("UPDATE `attributes` SET `code` = 'Création d\'indicateurs clés' WHERE `attributes`.`id` = 373;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mutualisation de données' WHERE `attributes`.`id` = 374;");

            DB::statement("UPDATE `attributes` SET `code` = 'Format story telling (lié à la datavisualisation)' WHERE `attributes`.`id` = 375;");

            DB::statement("UPDATE `attributes` SET `code` = 'Outil collaboratif avec le client' WHERE `attributes`.`id` = 376;");

            DB::statement("UPDATE `attributes` SET `code` = 'Niveaux d\'accès paramétrables' WHERE `attributes`.`id` = 378;");

            DB::statement("UPDATE `attributes` SET `code` = 'Solution logiciel' WHERE `attributes`.`id` = 379;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapports' WHERE `attributes`.`id` = 380;");

            DB::statement("UPDATE `attributes` SET `code` = 'Comparatifs des options' WHERE `attributes`.`id` = 381;");

            DB::statement("UPDATE `attributes` SET `code` = 'Accès par le client à son espace' WHERE `attributes`.`id` = 382;");

            DB::statement("UPDATE `attributes` SET `code` = 'Import de  données' WHERE `attributes`.`id` = 383;");

            DB::statement("UPDATE `attributes` SET `code` = 'Export de données personnalisable' WHERE `attributes`.`id` = 385;");

            DB::statement("UPDATE `attributes` SET `code` = 'Export de  données personnalisable ,Si oui quels formats ?' WHERE `attributes`.`id` = 386;");

            DB::statement("UPDATE `attributes` SET `code` = 'Benchmark' WHERE `attributes`.`id` = 387;");

            DB::statement("UPDATE `attributes` SET `code` = 'Tableaux de bord' WHERE `attributes`.`id` = 388;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapports de pilotage' WHERE `attributes`.`id` = 389;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mesure de la performance' WHERE `attributes`.`id` = 390;");

            DB::statement("UPDATE `attributes` SET `code` = 'Planification de la réduction des émissions de GES' WHERE `attributes`.`id` = 391;");

            DB::statement("UPDATE `attributes` SET `code` = 'Suivi des GES' WHERE `attributes`.`id` = 392;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapports et analyses' WHERE `attributes`.`id` = 393;");

            DB::statement("UPDATE `attributes` SET `code` = 'Attestation des éco-organismes' WHERE `attributes`.`id` = 394;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des prospects' WHERE `attributes`.`id` = 395;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des affaires' WHERE `attributes`.`id` = 396;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des tâches clients' WHERE `attributes`.`id` = 397;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des relances des impayés' WHERE `attributes`.`id` = 398;");

            DB::statement("UPDATE `attributes` SET `code` = 'Collecte de documents' WHERE `attributes`.`id` = 399;");

            DB::statement("UPDATE `attributes` SET `code` = 'Envoi d\'emails via le logiciel' WHERE `attributes`.`id` = 400;");

            DB::statement("UPDATE `attributes` SET `code` = 'Suivi des demandes / tickets' WHERE `attributes`.`id` = 401;");

            DB::statement("UPDATE `attributes` SET `code` = 'Champs paramétrables' WHERE `attributes`.`id` = 402;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapports paramétrables' WHERE `attributes`.`id` = 403;");

            DB::statement("UPDATE `attributes` SET `code` = 'Dashboards personnalisables' WHERE `attributes`.`id` = 404;");

            DB::statement("UPDATE `attributes` SET `code` = 'Double accès cabinet  et client' WHERE `attributes`.`id` = 405;");

            DB::statement("UPDATE `attributes` SET `code` = 'Facturation des temps' WHERE `attributes`.`id` = 406;");

            DB::statement("UPDATE `attributes` SET `code` = 'Suivi de production du cabinet' WHERE `attributes`.`id` = 407;");

            DB::statement("UPDATE `attributes` SET `code` = 'Espace collaboratif pour les collaborateurs' WHERE `attributes`.`id` = 408;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion de projet' WHERE `attributes`.`id` = 409;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion électronique des documents' WHERE `attributes`.`id` = 410;");

            DB::statement("UPDATE `attributes` SET `code` = 'Espace dédié par dossier / client' WHERE `attributes`.`id` = 411;");

            DB::statement("UPDATE `attributes` SET `code` = 'Paramétrage des droits utilisateurs' WHERE `attributes`.`id` = 412;");

            DB::statement("UPDATE `attributes` SET `code` = 'Alertes automatiques personnalisables' WHERE `attributes`.`id` = 413;");

            DB::statement("UPDATE `attributes` SET `code` = 'Tableaux  de bord' WHERE `attributes`.`id` = 414;");

            DB::statement("UPDATE `attributes` SET `code` = 'Consolidation des différents comptes bancaires' WHERE `attributes`.`id` = 415;");

            DB::statement("UPDATE `attributes` SET `code` = 'Suivi en temps réel des flux de trésorerie' WHERE `attributes`.`id` = 416;");

            DB::statement("UPDATE `attributes` SET `code` = 'Etablissement des budgets' WHERE `attributes`.`id` = 417;");

            DB::statement("UPDATE `attributes` SET `code` = 'Etablissement de prévisionnels de trésorerie' WHERE `attributes`.`id` = 418;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des délais de paiement' WHERE `attributes`.`id` = 419;");

            DB::statement("UPDATE `attributes` SET `code` = 'Identification des retards de paiement' WHERE `attributes`.`id` = 420;");

            DB::statement("UPDATE `attributes` SET `code` = 'Optimisation du BFR' WHERE `attributes`.`id` = 421;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des pénuries ou excès de trésorerie avec la banque' WHERE `attributes`.`id` = 422;");

            DB::statement("UPDATE `attributes` SET `code` = 'Identification des besoins de financement' WHERE `attributes`.`id` = 423;");

            DB::statement("UPDATE `attributes` SET `code` = 'Export de rapports à destination des tiers (banques, ...)' WHERE `attributes`.`id` = 424;");

            DB::statement("UPDATE `attributes` SET `code` = 'Partage des accès avec les collaborateurs, DAF, EC …' WHERE `attributes`.`id` = 425;");

            DB::statement("UPDATE `attributes` SET `code` = 'Création ou transformation d\'une facture au format CII' WHERE `attributes`.`id` = 426;");

            DB::statement("UPDATE `attributes` SET `code` = 'Création ou transformation d\'une facture au format UBL' WHERE `attributes`.`id` = 427;");

            DB::statement("UPDATE `attributes` SET `code` = 'Génération d\'un e-reporting normé à partir de plusieurs sources (caisses, logiciel dédié …)' WHERE `attributes`.`id` = 428;");

            DB::statement("UPDATE `attributes` SET `code` = 'Intégration comptable' WHERE `attributes`.`id` = 429;");

            DB::statement("UPDATE `attributes` SET `code` = 'Signature / scellement des factures électroniques intégré' WHERE `attributes`.`id` = 430;");

            DB::statement("UPDATE `attributes` SET `code` = 'Application mobile disponible' WHERE `attributes`.`id` = 431;");

            DB::statement("UPDATE `attributes` SET `code` = 'Confidentialité des données' WHERE `attributes`.`id` = 432;");

            DB::statement("UPDATE `attributes` SET `code` = 'Confidentialité des données , si oui décrire .' WHERE `attributes`.`id` = 433;");

            DB::statement("UPDATE `attributes` SET `code` = 'Périmètre' WHERE `attributes`.`id` = 439;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre de placements proposés , si oui  Préciser les types de placements  ?' WHERE `attributes`.`id` = 440;");

            DB::statement("UPDATE `attributes` SET `code` = 'Solution de comptabilité ou de précomptabilité' WHERE `attributes`.`id` = 444;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mode de  tarification' WHERE `attributes`.`id` = 445;");

            DB::statement("UPDATE `attributes` SET `code` = 'Les 3 atouts de la solution' WHERE `attributes`.`id` = 446;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mode  de tarification ' WHERE `attributes`.`id` = 448;");

            DB::statement("UPDATE `attributes` SET `code` = 'Export de données personnalisable ,Si oui quels formats ?' WHERE `attributes`.`id` = 449;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mises à jour gratuites, si non montant ?' WHERE `attributes`.`id` = 450;");

            DB::statement("UPDATE `attributes` SET `code` = 'Coût de maintenance inclus, si non montant.' WHERE `attributes`.`id` = 451;");

            DB::statement("UPDATE `attributes` SET `code` = 'Import de données , si oui quel format ?' WHERE `attributes`.`id` = 452;");

            DB::statement("UPDATE `attributes` SET `code` = 'Plan de récupération en cas de cyberattaque, si oui décrire.' WHERE `attributes`.`id` = 453;");

            DB::statement("UPDATE `attributes` SET `code` = 'Sur les 36 cas d\'usage décrits initialement dans les spécifications, combien en gère la PDP ? Et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attributes`.`id` = 454;");

            DB::statement("UPDATE `attributes` SET `code` = 'Description' WHERE `attributes`.`id` = 455;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre de placements proposés' WHERE `attributes`.`id` = 456;");

            DB::statement("UPDATE `attributes` SET `code` = 'Factures au format facture électronique , si oui le format est-il compatible' WHERE `attributes`.`id` = 457;");

            DB::statement("UPDATE `attributes` SET `code` = 'Edition de la liasse fiscale' WHERE `attributes`.`id` = 458;");

            DB::statement("UPDATE `attributes` SET `code` = 'Nombre de PDP interfacées avec la PDP , avec lesquelles ?' WHERE `attributes`.`id` = 459;");

            DB::statement("UPDATE `attributes` SET `code` = 'Cible visée par la PDP (GE / ETI / PME / TPE / international)' WHERE `attributes`.`id` = 460;");

            DB::statement("UPDATE `attributes` SET `code` = 'PDP prévue pour une utilisation par le cabinet et ses dossiers clients' WHERE `attributes`.`id` = 461;");

            DB::statement("UPDATE `attributes` SET `code` = 'La PDP fait partie d\'une suite logicielle' WHERE `attributes`.`id` = 462;");

            DB::statement("UPDATE `attributes` SET `code` = 'La PDP fait partie d\'une suite logicielle, si oui, laquelle ?' WHERE `attributes`.`id` = 463;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des workflows de validation des factures' WHERE `attributes`.`id` = 464;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des workflows de validation des paiements' WHERE `attributes`.`id` = 465;");

            DB::statement("UPDATE `attributes` SET `code` = 'Rapprochement automatique des factures et paiements avec mise à jour du cycle de vie' WHERE `attributes`.`id` = 466;");

            DB::statement("UPDATE `attributes` SET `code` = 'Gestion des relances factures clients en retard de paiement' WHERE `attributes`.`id` = 467;");

            DB::statement("UPDATE `attributes` SET `code` = 'Possibilité de saisie manuelle des Z de caisse par jour et taux de TVA' WHERE `attributes`.`id` = 468;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module de contrôle de validité des informations (SIREN, RIB, IBAN... ) intégré' WHERE `attributes`.`id` = 469;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module complet de gestion commerciale (devis, Bdc, facture…) intégré' WHERE `attributes`.`id` = 470;");

            DB::statement("UPDATE `attributes` SET `code` = 'Module de financement des factures intégré' WHERE `attributes`.`id` = 471;");

            DB::statement("UPDATE `attributes` SET `code` = 'Génération de tableau bord de suivi des paiements des factures clients et fournisseurs' WHERE `attributes`.`id` = 472;");

            DB::statement("UPDATE `attributes` SET `code` = 'Avec combien de PDP la vôtre s\'interface-t-elle ?' WHERE `attributes`.`id` = 473;");

            DB::statement("UPDATE `attributes` SET `code` = 'Récupération simple de ses données pour le client en cas de changement de PDP' WHERE `attributes`.`id` = 474;");

            DB::statement("UPDATE `attributes` SET `code` = 'Périmètre de votre certification ISO 27001' WHERE `attributes`.`id` = 475;");

            DB::statement("UPDATE `attributes` SET `code` = 'Support situé en France' WHERE `attributes`.`id` = 476;");

            DB::statement("UPDATE `attributes` SET `code` = 'Formation des utilisateurs proposée' WHERE `attributes`.`id` = 477;");

            DB::statement("UPDATE `attributes` SET `code` = 'Hotline incluse' WHERE `attributes`.`id` = 478;");

            DB::statement("UPDATE `attributes` SET `code` = 'Hotline incluse, si non montant.' WHERE `attributes`.`id` = 479;");

            DB::statement("UPDATE `attributes` SET `code` = 'Quelles sont les PDP qui s\'interfacent avec la vôtre ?' WHERE `attributes`.`id` = 480;");

            DB::statement("UPDATE `attributes` SET `code` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...), Si oui, lesquels ?' WHERE `attributes`.`id` = 481;");

            DB::statement("UPDATE `attributes` SET `code` = 'Préciser si la facturation est à l\'émission et/ou à la réception de facture, les conditions de la gratuité, autre…' WHERE `attributes`.`id` = 482;");

            DB::statement("UPDATE `attributes` SET `code` = 'Mode de tarification' WHERE `attributes`.`id` = 483;");

            DB::statement("UPDATE `attributes` SET `code` = 'Descriptif de la garantie de confidentialité des données' WHERE `attributes`.`id` = 484;");

            DB::statement("UPDATE `attributes` SET `code` = 'Pre-requis' WHERE `attributes`.`id` = 485;");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_name', function (Blueprint $table) {
            //
        });
    }
};
