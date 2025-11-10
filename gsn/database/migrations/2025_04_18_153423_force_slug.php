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
        //

        DB::statement("UPDATE `attributes` SET `code` = 'sku' WHERE `attributes`.`id` = 1;");

        DB::statement("UPDATE `attributes` SET `code` = 'nom' WHERE `attributes`.`id` = 2;");

        DB::statement("UPDATE `attributes` SET `code` = 'cle-durl' WHERE `attributes`.`id` = 3;");

        DB::statement("UPDATE `attributes` SET `code` = 'visible-individuellement' WHERE `attributes`.`id` = 7;");

        DB::statement("UPDATE `attributes` SET `code` = 'actif' WHERE `attributes`.`id` = 8;");

        DB::statement("UPDATE `attributes` SET `code` = 'breve-description' WHERE `attributes`.`id` = 9;");

        DB::statement("UPDATE `attributes` SET `code` = 'prix' WHERE `attributes`.`id` = 11;");

        DB::statement("UPDATE `attributes` SET `code` = 'cout' WHERE `attributes`.`id` = 12;");

        DB::statement("UPDATE `attributes` SET `code` = 'prix-special' WHERE `attributes`.`id` = 13;");

        DB::statement("UPDATE `attributes` SET `code` = 'prix-special-a-partir-de' WHERE `attributes`.`id` = 14;");

        DB::statement("UPDATE `attributes` SET `code` = 'prix-special-jusqua' WHERE `attributes`.`id` = 15;");

        DB::statement("UPDATE `attributes` SET `code` = 'meta-titre' WHERE `attributes`.`id` = 16;");

        DB::statement("UPDATE `attributes` SET `code` = 'mots-cles-meta' WHERE `attributes`.`id` = 17;");

        DB::statement("UPDATE `attributes` SET `code` = 'meta-description' WHERE `attributes`.`id` = 18;");

        DB::statement("UPDATE `attributes` SET `code` = 'longueur' WHERE `attributes`.`id` = 19;");

        DB::statement("UPDATE `attributes` SET `code` = 'largeur' WHERE `attributes`.`id` = 20;");

        DB::statement("UPDATE `attributes` SET `code` = 'hauteur' WHERE `attributes`.`id` = 21;");

        DB::statement("UPDATE `attributes` SET `code` = 'poids' WHERE `attributes`.`id` = 22;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-stocks' WHERE `attributes`.`id` = 28;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapprochement-bancaire-et-lettrage' WHERE `attributes`.`id` = 32;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-de-facturation-compatible-facturation-electronique' WHERE `attributes`.`id` = 37;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-lir' WHERE `attributes`.`id` = 39;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-notes-de-frais' WHERE `attributes`.`id` = 40;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-ocr-integre' WHERE `attributes`.`id` = 41;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-secteurs-particuliers-btp-associations-si-oui-lesquels' WHERE `attributes`.`id` = 43;");

        DB::statement("UPDATE `attributes` SET `code` = 'previsionnels-de-budget' WHERE `attributes`.`id` = 46;");

        DB::statement("UPDATE `attributes` SET `code` = 'utilise-un-rpa-robotic-process-automation' WHERE `attributes`.`id` = 51;");

        DB::statement("UPDATE `attributes` SET `code` = 'integre-une-solution-ia' WHERE `attributes`.`id` = 52;");

        DB::statement("UPDATE `attributes` SET `code` = 'integre-une-solution-ia-si-oui-laquelle' WHERE `attributes`.`id` = 53;");

        DB::statement("UPDATE `attributes` SET `code` = 'api-disponibles-si-oui-lesquelles' WHERE `attributes`.`id` = 55;");

        DB::statement("UPDATE `attributes` SET `code` = 'integration-bureautique-type-excel-ou-power-bi' WHERE `attributes`.`id` = 60;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-de-facturation-si-oui-lesquels' WHERE `attributes`.`id` = 62;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-des-pdp-si-oui-lesquelles' WHERE `attributes`.`id` = 64;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-dachat-si-oui-lesquels' WHERE `attributes`.`id` = 67;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-systeme-de-conservation-ou-darchivage-si-oui-lesquelles' WHERE `attributes`.`id` = 70;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-coffre-fort-si-oui-lesquels' WHERE `attributes`.`id` = 72;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-crm-grc-si-oui-lesquels' WHERE `attributes`.`id` = 74;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-des-solutions-metier-si-oui-lesquelles' WHERE `attributes`.`id` = 76;");

        DB::statement("UPDATE `attributes` SET `code` = 'mise-a-jour-avec-les-nouvelles-reglementations-si-oui-quelle-frequence' WHERE `attributes`.`id` = 79;");

        DB::statement("UPDATE `attributes` SET `code` = 'hebergement--des-donnees-en-ue' WHERE `attributes`.`id` = 82;");

        DB::statement("UPDATE `attributes` SET `code` = 'plan-de-recuperation-en-cas-de-cyber-attaque-si-oui-decrire' WHERE `attributes`.`id` = 84;");

        DB::statement("UPDATE `attributes` SET `code` = 'hotline-si-oui-horaires' WHERE `attributes`.`id` = 87;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-temps-de-travail' WHERE `attributes`.`id` = 101;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-carrieres-et-entretiens' WHERE `attributes`.`id` = 104;");

        DB::statement("UPDATE `attributes` SET `code` = 'bilan-social' WHERE `attributes`.`id` = 106;");

        DB::statement("UPDATE `attributes` SET `code` = 'modele-de-paie-par-categories-de-salaries' WHERE `attributes`.`id` = 107;");

        DB::statement("UPDATE `attributes` SET `code` = 'declaration-prealable-a-lembauche' WHERE `attributes`.`id` = 108;");

        DB::statement("UPDATE `attributes` SET `code` = 'coffre-fort-electronique-et-archivage-electronique-des-bulletins-de-paie' WHERE `attributes`.`id` = 111;");

        DB::statement("UPDATE `attributes` SET `code` = 'demarrage-des-dossiers-en-cours-dannee-import-de-dsn' WHERE `attributes`.`id` = 120;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-de-conventions-collectives-gerees' WHERE `attributes`.`id` = 121;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-regimes-speciaux-si-oui-lesquels' WHERE `attributes`.`id` = 123;");

        DB::statement("UPDATE `attributes` SET `code` = 'import-de-donnees-si-oui-quels-formats' WHERE `attributes`.`id` = 127;");

        DB::statement("UPDATE `attributes` SET `code` = 'generation-des-ecritures-comptables-de-paie-si-oui-quels-formats' WHERE `attributes`.`id` = 131;");

        DB::statement("UPDATE `attributes` SET `code` = 'generation-des-ecritures-comptables-de-paie' WHERE `attributes`.`id` = 132;");

        DB::statement("UPDATE `attributes` SET `code` = 'annees-de-conservation-de-lhistorique' WHERE `attributes`.`id` = 134;");

        DB::statement("UPDATE `attributes` SET `code` = 'hebergement-des-donnees-en-ue' WHERE `attributes`.`id` = 138;");

        DB::statement("UPDATE `attributes` SET `code` = 'prerequis' WHERE `attributes`.`id` = 152;");

        DB::statement("UPDATE `attributes` SET `code` = 'solution-logicielle-si-non-precisez-le-type-de-solution' WHERE `attributes`.`id` = 155;");

        DB::statement("UPDATE `attributes` SET `code` = 'fonction-principale-de-la-solution' WHERE `attributes`.`id` = 156;");

        DB::statement("UPDATE `attributes` SET `code` = 'presentation-de-la-solution' WHERE `attributes`.`id` = 157;");

        DB::statement("UPDATE `attributes` SET `code` = 'importation-et-exploitation-dopen-data' WHERE `attributes`.`id` = 159;");

        DB::statement("UPDATE `attributes` SET `code` = 'datavisualisation-tableaux-de-bord' WHERE `attributes`.`id` = 160;");

        DB::statement("UPDATE `attributes` SET `code` = 'comparaison-sectorielle' WHERE `attributes`.`id` = 161;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapports-personnalisables' WHERE `attributes`.`id` = 163;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-predictif' WHERE `attributes`.`id` = 166;");

        DB::statement("UPDATE `attributes` SET `code` = 'api-push-export-de-donnees' WHERE `attributes`.`id` = 169;");

        DB::statement("UPDATE `attributes` SET `code` = 'api-pull-import-de-donnees-externes' WHERE `attributes`.`id` = 170;");

        DB::statement("UPDATE `attributes` SET `code` = 'interconnexions-a-des-sources-de-donnees' WHERE `attributes`.`id` = 172;");

        DB::statement("UPDATE `attributes` SET `code` = 'interconnexions-a-des-sources-de-donnees-si-oui-lesquelles' WHERE `attributes`.`id` = 173;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-clients' WHERE `attributes`.`id` = 175;");

        DB::statement("UPDATE `attributes` SET `code` = 'historique-des-interactions' WHERE `attributes`.`id` = 178;");

        DB::statement("UPDATE `attributes` SET `code` = 'relance-automatique-des-taches' WHERE `attributes`.`id` = 180;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-devis' WHERE `attributes`.`id` = 181;");

        DB::statement("UPDATE `attributes` SET `code` = 'creation-des-factures' WHERE `attributes`.`id` = 182;");

        DB::statement("UPDATE `attributes` SET `code` = 'factures-au-format-facture-electronique' WHERE `attributes`.`id` = 183;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-paiements' WHERE `attributes`.`id` = 184;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-temps' WHERE `attributes`.`id` = 195;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-multi-sites' WHERE `attributes`.`id` = 198;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-de-comptabilite' WHERE `attributes`.`id` = 204;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-de-comptabilite-si-oui-lesquels' WHERE `attributes`.`id` = 205;");

        DB::statement("UPDATE `attributes` SET `code` = 'extra-financier' WHERE `attributes`.`id` = 207;");

        DB::statement("UPDATE `attributes` SET `code` = 'bilan-carbone' WHERE `attributes`.`id` = 208;");

        DB::statement("UPDATE `attributes` SET `code` = 'demarche-rse' WHERE `attributes`.`id` = 209;");

        DB::statement("UPDATE `attributes` SET `code` = 'emission-de-gaz-a-effet-de-serre' WHERE `attributes`.`id` = 210;");

        DB::statement("UPDATE `attributes` SET `code` = 'labellisation' WHERE `attributes`.`id` = 211;");

        DB::statement("UPDATE `attributes` SET `code` = 'csrd' WHERE `attributes`.`id` = 212;");

        DB::statement("UPDATE `attributes` SET `code` = 'csrd-volontaire' WHERE `attributes`.`id` = 213;");

        DB::statement("UPDATE `attributes` SET `code` = 'finance-durable' WHERE `attributes`.`id` = 214;");

        DB::statement("UPDATE `attributes` SET `code` = 'eco-organismes' WHERE `attributes`.`id` = 215;");

        DB::statement("UPDATE `attributes` SET `code` = 'controle-des-fec' WHERE `attributes`.`id` = 225;");

        DB::statement("UPDATE `attributes` SET `code` = 'generation-automatisee-du-compte-rendu-de-mission' WHERE `attributes`.`id` = 226;");

        DB::statement("UPDATE `attributes` SET `code` = 'importation-de-la-liasse-fiscale' WHERE `attributes`.`id` = 229;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-formalites-juridiques-creation-modification' WHERE `attributes`.`id` = 232;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-ag' WHERE `attributes`.`id` = 233;");

        DB::statement("UPDATE `attributes` SET `code` = 'recouvrement-de-creances' WHERE `attributes`.`id` = 235;");

        DB::statement("UPDATE `attributes` SET `code` = 'redaction-analyse-de-documents-juridiques' WHERE `attributes`.`id` = 236;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-contrats' WHERE `attributes`.`id` = 239;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-contrats-si-oui-type-de-contrats' WHERE `attributes`.`id` = 240;");

        DB::statement("UPDATE `attributes` SET `code` = 'generation-des-lettres-de-mission' WHERE `attributes`.`id` = 241;");

        DB::statement("UPDATE `attributes` SET `code` = 'creation-ou-transformation-dune-facture-au-format-factur-x' WHERE `attributes`.`id` = 242;");

        DB::statement("UPDATE `attributes` SET `code` = 'permet-lemission-et-la-reception-de-factures-hors-perimetre-du-e-invoicing-b2b-international-b2c-non-assujettis' WHERE `attributes`.`id` = 245;");

        DB::statement("UPDATE `attributes` SET `code` = 'permet-lemission-et-la-reception-de-factures-electroniques-dans-des-formats-autres-que-ceux-du-socle-minimal-edifact' WHERE `attributes`.`id` = 246;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-de-saisie-en-ligne-des-factures-disponible-pour-les-clients-du-cabinet' WHERE `attributes`.`id` = 247;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-de-statuts-du-cycle-de-vie-geres-en-dehors-des-statuts-obligatoires' WHERE `attributes`.`id` = 248;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-de-statuts-du-cycle-de-vie-geres-en-dehors-des-statuts-obligatoires-si-oui-lesquels' WHERE `attributes`.`id` = 249;");

        DB::statement("UPDATE `attributes` SET `code` = 'peut-envoyer-et-recevoir-des-factures-electroniques-sous-des-formats-autres-que-ceux-du-socle-minimal-si-oui-lesquels' WHERE `attributes`.`id` = 250;");

        DB::statement("UPDATE `attributes` SET `code` = 'service-de-paiement-disponible' WHERE `attributes`.`id` = 251;");

        DB::statement("UPDATE `attributes` SET `code` = 'cible-visee-ge-eti-pme-tpe-international' WHERE `attributes`.`id` = 253;");

        DB::statement("UPDATE `attributes` SET `code` = 'sur-les-36-cas-dusage-decrits-initialement-dans-les-specifications-combien-en-gere-la-pdp' WHERE `attributes`.`id` = 254;");

        DB::statement("UPDATE `attributes` SET `code` = 'service-darchivage-des-factures-integre' WHERE `attributes`.`id` = 256;");

        DB::statement("UPDATE `attributes` SET `code` = 'signature-scellement-des-factures-electroniques' WHERE `attributes`.`id` = 257;");

        DB::statement("UPDATE `attributes` SET `code` = 'signature-scellement-des-factures-electroniques-integre-si-oui-la-solution-utilisee' WHERE `attributes`.`id` = 258;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-du-cycle-entier-de-facturation-creation-validation-des-factures-recues-numerisation-reporting-operationnel' WHERE `attributes`.`id` = 259;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-du-cycle-entier-de-facturation-creation-validation-des-factures-recues-numerisation-reporting-operationnel-si-non-lesquelles-sont-assurees' WHERE `attributes`.`id` = 260;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-de-pdp-interfacees-avec-la-pdp' WHERE `attributes`.`id` = 262;");

        DB::statement("UPDATE `attributes` SET `code` = 'votre-pdp-est-point-dacces-peppol' WHERE `attributes`.`id` = 264;");

        DB::statement("UPDATE `attributes` SET `code` = 'integration-comptable-si-oui-avec-quels-editeurs' WHERE `attributes`.`id` = 266;");

        DB::statement("UPDATE `attributes` SET `code` = 'inscription-sur-la-liste-des-immatriculations-provisoires-pdp-de-la-dgfip' WHERE `attributes`.`id` = 267;");

        DB::statement("UPDATE `attributes` SET `code` = 'bilan-patrimonial' WHERE `attributes`.`id` = 268;");

        DB::statement("UPDATE `attributes` SET `code` = 'projections' WHERE `attributes`.`id` = 269;");

        DB::statement("UPDATE `attributes` SET `code` = 'simulation-fiscale' WHERE `attributes`.`id` = 270;");

        DB::statement("UPDATE `attributes` SET `code` = 'simulation-succession' WHERE `attributes`.`id` = 274;");

        DB::statement("UPDATE `attributes` SET `code` = 'diagnostic-retraite' WHERE `attributes`.`id` = 276;");

        DB::statement("UPDATE `attributes` SET `code` = 'reporting-sur-la-sante-financiere-de-lentreprise' WHERE `attributes`.`id` = 278;");

        DB::statement("UPDATE `attributes` SET `code` = 'anticipation-des-risques-financiers' WHERE `attributes`.`id` = 279;");

        DB::statement("UPDATE `attributes` SET `code` = 'synchronisation-bancaire' WHERE `attributes`.`id` = 282;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapprochement-bancaire' WHERE `attributes`.`id` = 284;");

        DB::statement("UPDATE `attributes` SET `code` = 'flux-de-caisse' WHERE `attributes`.`id` = 285;");

        DB::statement("UPDATE `attributes` SET `code` = 'relances-clients' WHERE `attributes`.`id` = 292;");

        DB::statement("UPDATE `attributes` SET `code` = 'emission-des-reglements' WHERE `attributes`.`id` = 294;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-comptable' WHERE `attributes`.`id` = 299;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-comptable-si-oui-lesquels' WHERE `attributes`.`id` = 300;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-de-gestion-caisse' WHERE `attributes`.`id` = 301;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-de-gestion-caisse-si-oui-lesquels' WHERE `attributes`.`id` = 302;");

        DB::statement("UPDATE `attributes` SET `code` = 'solution-darchivage-electronique-sae' WHERE `attributes`.`id` = 303;");

        DB::statement("UPDATE `attributes` SET `code` = 'solution-darchivage-electronique-a-valeur-probante' WHERE `attributes`.`id` = 304;");

        DB::statement("UPDATE `attributes` SET `code` = 'solution-de-signature-electronique' WHERE `attributes`.`id` = 305;");

        DB::statement("UPDATE `attributes` SET `code` = 'niveau-de-signature' WHERE `attributes`.`id` = 306;");

        DB::statement("UPDATE `attributes` SET `code` = 'modalite-de-collecte' WHERE `attributes`.`id` = 307;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-maximum-de-documents-par-collecte' WHERE `attributes`.`id` = 308;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-maximum-de-signataires-par-collecte' WHERE `attributes`.`id` = 309;");

        DB::statement("UPDATE `attributes` SET `code` = 'formats-des-documents-a-signer' WHERE `attributes`.`id` = 310;");

        DB::statement("UPDATE `attributes` SET `code` = 'teletransmissions-fiscales' WHERE `attributes`.`id` = 311;");

        DB::statement("UPDATE `attributes` SET `code` = 'teletransmissions-sociales' WHERE `attributes`.`id` = 312;");

        DB::statement("UPDATE `attributes` SET `code` = 'recuperation-des-releves-bancaires' WHERE `attributes`.`id` = 313;");

        DB::statement("UPDATE `attributes` SET `code` = 'certifie-eidas' WHERE `attributes`.`id` = 315;");

        DB::statement("UPDATE `attributes` SET `code` = 'comptabilite-generale' WHERE `attributes`.`id` = 316;");

        DB::statement("UPDATE `attributes` SET `code` = 'comptabilite-analytique' WHERE `attributes`.`id` = 317;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-de-paiement-automatique' WHERE `attributes`.`id` = 318;");

        DB::statement("UPDATE `attributes` SET `code` = 'cachet-qualifie-ou-signature-electronique' WHERE `attributes`.`id` = 319;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-la-paie' WHERE `attributes`.`id` = 320;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-cotisations-tns' WHERE `attributes`.`id` = 321;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-immobilisations' WHERE `attributes`.`id` = 322;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-secteurs-particuliers-btp-associations' WHERE `attributes`.`id` = 323;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-de-datavisualisation-de-donnees-parametrable' WHERE `attributes`.`id` = 325;");

        DB::statement("UPDATE `attributes` SET `code` = 'previsionnels-ca' WHERE `attributes`.`id` = 326;");

        DB::statement("UPDATE `attributes` SET `code` = 'previsionnels-de-tresorerie' WHERE `attributes`.`id` = 327;");

        DB::statement("UPDATE `attributes` SET `code` = 'analyses-predictives' WHERE `attributes`.`id` = 328;");

        DB::statement("UPDATE `attributes` SET `code` = 'acces-par-le-client-a-son-dossier' WHERE `attributes`.`id` = 329;");

        DB::statement("UPDATE `attributes` SET `code` = 'api-disponibles' WHERE `attributes`.`id` = 330;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-de-facturation' WHERE `attributes`.`id` = 331;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-des-pdp' WHERE `attributes`.`id` = 332;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-logiciel-dachat' WHERE `attributes`.`id` = 333;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-lebics' WHERE `attributes`.`id` = 334;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-systeme-de-conservation-ou-darchivage' WHERE `attributes`.`id` = 335;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-coffre-fort' WHERE `attributes`.`id` = 336;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-un-crm-grc' WHERE `attributes`.`id` = 337;");

        DB::statement("UPDATE `attributes` SET `code` = 'interoperable-avec-des-solutions-metier' WHERE `attributes`.`id` = 338;");

        DB::statement("UPDATE `attributes` SET `code` = 'conforme-rgpd' WHERE `attributes`.`id` = 339;");

        DB::statement("UPDATE `attributes` SET `code` = 'mise-a-jour-avec-les-nouvelles-reglementations' WHERE `attributes`.`id` = 340;");

        DB::statement("UPDATE `attributes` SET `code` = 'acces-cloud' WHERE `attributes`.`id` = 341;");

        DB::statement("UPDATE `attributes` SET `code` = 'plan-de-recuperation-en-cas-de-cyberattaque' WHERE `attributes`.`id` = 342;");

        DB::statement("UPDATE `attributes` SET `code` = 'hotline' WHERE `attributes`.`id` = 343;");

        DB::statement("UPDATE `attributes` SET `code` = 'chat-bot' WHERE `attributes`.`id` = 344;");

        DB::statement("UPDATE `attributes` SET `code` = 'formation-des-utilisateurs' WHERE `attributes`.`id` = 345;");

        DB::statement("UPDATE `attributes` SET `code` = 'cout-de-maintenance-inclus' WHERE `attributes`.`id` = 346;");

        DB::statement("UPDATE `attributes` SET `code` = 'mises-a-jour-gratuites' WHERE `attributes`.`id` = 347;");

        DB::statement("UPDATE `attributes` SET `code` = 'fait-partie-dune-suite-logicielle' WHERE `attributes`.`id` = 348;");

        DB::statement("UPDATE `attributes` SET `code` = 'import--de-donnees' WHERE `attributes`.`id` = 349;");

        DB::statement("UPDATE `attributes` SET `code` = 'transmission-a-la-dgfip' WHERE `attributes`.`id` = 351;");

        DB::statement("UPDATE `attributes` SET `code` = 'traitement-simultane-de-plusieurs-dossiers' WHERE `attributes`.`id` = 352;");

        DB::statement("UPDATE `attributes` SET `code` = 'detection-des-anomalies' WHERE `attributes`.`id` = 353;");

        DB::statement("UPDATE `attributes` SET `code` = 'format-du-crm' WHERE `attributes`.`id` = 354;");

        DB::statement("UPDATE `attributes` SET `code` = 'depot-des-comptes' WHERE `attributes`.`id` = 355;");

        DB::statement("UPDATE `attributes` SET `code` = 'base-documentaire-juridique' WHERE `attributes`.`id` = 356;");

        DB::statement("UPDATE `attributes` SET `code` = 'base-documentaire-fiscale' WHERE `attributes`.`id` = 357;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-participation-et-interessement' WHERE `attributes`.`id` = 358;");

        DB::statement("UPDATE `attributes` SET `code` = 'duplication-delements-fiche-salarie-rubrique-de-paie' WHERE `attributes`.`id` = 359;");

        DB::statement("UPDATE `attributes` SET `code` = 'statistiques-et-tableaux-de-bord-personnalises' WHERE `attributes`.`id` = 360;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-la-fonction-publique' WHERE `attributes`.`id` = 361;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-du-flux-dsn' WHERE `attributes`.`id` = 362;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-dsn-mensuelles' WHERE `attributes`.`id` = 363;");

        DB::statement("UPDATE `attributes` SET `code` = 'controle-et-assistance-aux-zones-de-saisie-obligatoires-en-dsn' WHERE `attributes`.`id` = 364;");

        DB::statement("UPDATE `attributes` SET `code` = 'aide-a-la-correction-des-erreurs-declaratives-des-dsn-avant-envoi-du-flux' WHERE `attributes`.`id` = 365;");

        DB::statement("UPDATE `attributes` SET `code` = 'saisie-decentralisee-des-variables-de-paie-du-mois-avec-report-sur-le-suivant' WHERE `attributes`.`id` = 366;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-utilisateurs-et-de-leurs-droits-dacces' WHERE `attributes`.`id` = 367;");

        DB::statement("UPDATE `attributes` SET `code` = 'saisie-des-evenements-par-les-clients' WHERE `attributes`.`id` = 368;");

        DB::statement("UPDATE `attributes` SET `code` = 'parametrage-par-lutilisateur-des-lignes-du-bulletin-de-paie' WHERE `attributes`.`id` = 369;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-regimes-speciaux' WHERE `attributes`.`id` = 370;");

        DB::statement("UPDATE `attributes` SET `code` = 'double-acces-cabinet-et--client' WHERE `attributes`.`id` = 371;");

        DB::statement("UPDATE `attributes` SET `code` = 'creation-de-modeles-de-donnees' WHERE `attributes`.`id` = 372;");

        DB::statement("UPDATE `attributes` SET `code` = 'creation-dindicateurs-cles' WHERE `attributes`.`id` = 373;");

        DB::statement("UPDATE `attributes` SET `code` = 'mutualisation-de-donnees' WHERE `attributes`.`id` = 374;");

        DB::statement("UPDATE `attributes` SET `code` = 'format-story-telling-lie-a-la-datavisualisation' WHERE `attributes`.`id` = 375;");

        DB::statement("UPDATE `attributes` SET `code` = 'outil-collaboratif-avec-le-client' WHERE `attributes`.`id` = 376;");

        DB::statement("UPDATE `attributes` SET `code` = 'niveaux-dacces-parametrables' WHERE `attributes`.`id` = 378;");

        DB::statement("UPDATE `attributes` SET `code` = 'solution-logiciel' WHERE `attributes`.`id` = 379;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapports' WHERE `attributes`.`id` = 380;");

        DB::statement("UPDATE `attributes` SET `code` = 'comparatifs-des-options' WHERE `attributes`.`id` = 381;");

        DB::statement("UPDATE `attributes` SET `code` = 'acces-par-le-client-a-son-espace' WHERE `attributes`.`id` = 382;");

        DB::statement("UPDATE `attributes` SET `code` = 'import-de-donnees' WHERE `attributes`.`id` = 383;");

        DB::statement("UPDATE `attributes` SET `code` = 'export-de-donnees--personnalisable' WHERE `attributes`.`id` = 385;");

        DB::statement("UPDATE `attributes` SET `code` = 'export-de-donnees--personnalisable-si-oui-quels-formats' WHERE `attributes`.`id` = 386;");

        DB::statement("UPDATE `attributes` SET `code` = 'benchmark' WHERE `attributes`.`id` = 387;");

        DB::statement("UPDATE `attributes` SET `code` = 'tableaux-de--bord' WHERE `attributes`.`id` = 388;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapports-de-pilotage' WHERE `attributes`.`id` = 389;");

        DB::statement("UPDATE `attributes` SET `code` = 'mesure-de-la-performance' WHERE `attributes`.`id` = 390;");

        DB::statement("UPDATE `attributes` SET `code` = 'planification-de-la-reduction-des-emissions-de-ges' WHERE `attributes`.`id` = 391;");

        DB::statement("UPDATE `attributes` SET `code` = 'suivi-des-ges' WHERE `attributes`.`id` = 392;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapports-et-analyses' WHERE `attributes`.`id` = 393;");

        DB::statement("UPDATE `attributes` SET `code` = 'attestation-des-eco-organismes' WHERE `attributes`.`id` = 394;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-prospects' WHERE `attributes`.`id` = 395;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-affaires' WHERE `attributes`.`id` = 396;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-taches-clients' WHERE `attributes`.`id` = 397;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-relances-des-impayes' WHERE `attributes`.`id` = 398;");

        DB::statement("UPDATE `attributes` SET `code` = 'collecte-de-documents' WHERE `attributes`.`id` = 399;");

        DB::statement("UPDATE `attributes` SET `code` = 'envoi-demails-via-le-logiciel' WHERE `attributes`.`id` = 400;");

        DB::statement("UPDATE `attributes` SET `code` = 'suivi-des-demandes-tickets' WHERE `attributes`.`id` = 401;");

        DB::statement("UPDATE `attributes` SET `code` = 'champs-parametrables' WHERE `attributes`.`id` = 402;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapports-parametrables' WHERE `attributes`.`id` = 403;");

        DB::statement("UPDATE `attributes` SET `code` = 'dashboards-personnalisables' WHERE `attributes`.`id` = 404;");

        DB::statement("UPDATE `attributes` SET `code` = 'double-acces-cabinet-et-client' WHERE `attributes`.`id` = 405;");

        DB::statement("UPDATE `attributes` SET `code` = 'facturation-des-temps' WHERE `attributes`.`id` = 406;");

        DB::statement("UPDATE `attributes` SET `code` = 'suivi-de-production-du-cabinet' WHERE `attributes`.`id` = 407;");

        DB::statement("UPDATE `attributes` SET `code` = 'espace-collaboratif-pour-les-collaborateurs' WHERE `attributes`.`id` = 408;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-de-projet' WHERE `attributes`.`id` = 409;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-electronique-des-documents' WHERE `attributes`.`id` = 410;");

        DB::statement("UPDATE `attributes` SET `code` = 'espace-dedie-par-dossier-client' WHERE `attributes`.`id` = 411;");

        DB::statement("UPDATE `attributes` SET `code` = 'parametrage-des-droits-utilisateurs' WHERE `attributes`.`id` = 412;");

        DB::statement("UPDATE `attributes` SET `code` = 'alertes-automatiques-personnalisables' WHERE `attributes`.`id` = 413;");

        DB::statement("UPDATE `attributes` SET `code` = 'tableaux-de-bord' WHERE `attributes`.`id` = 414;");

        DB::statement("UPDATE `attributes` SET `code` = 'consolidation-des-differents-comptes-bancaires' WHERE `attributes`.`id` = 415;");

        DB::statement("UPDATE `attributes` SET `code` = 'suivi-en-temps-reel-des-flux-de-tresorerie' WHERE `attributes`.`id` = 416;");

        DB::statement("UPDATE `attributes` SET `code` = 'etablissement-des-budgets' WHERE `attributes`.`id` = 417;");

        DB::statement("UPDATE `attributes` SET `code` = 'etablissement-de-previsionnels-de-tresorerie' WHERE `attributes`.`id` = 418;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-delais-de-paiement' WHERE `attributes`.`id` = 419;");

        DB::statement("UPDATE `attributes` SET `code` = 'identification-des-retards-de-paiement' WHERE `attributes`.`id` = 420;");

        DB::statement("UPDATE `attributes` SET `code` = 'optimisation-du-bfr' WHERE `attributes`.`id` = 421;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-penuries-ou-exces-de-tresorerie-avec-la-banque' WHERE `attributes`.`id` = 422;");

        DB::statement("UPDATE `attributes` SET `code` = 'identification-des-besoins-de-financement' WHERE `attributes`.`id` = 423;");

        DB::statement("UPDATE `attributes` SET `code` = 'export-de-rapports-a-destination-des-tiers-banques' WHERE `attributes`.`id` = 424;");

        DB::statement("UPDATE `attributes` SET `code` = 'partage-des-acces-avec-les-collaborateurs-daf-ec' WHERE `attributes`.`id` = 425;");

        DB::statement("UPDATE `attributes` SET `code` = 'creation-ou-transformation-dune-facture-au-format-cii' WHERE `attributes`.`id` = 426;");

        DB::statement("UPDATE `attributes` SET `code` = 'creation-ou-transformation-dune-facture-au-format-ubl' WHERE `attributes`.`id` = 427;");

        DB::statement("UPDATE `attributes` SET `code` = 'generation-dun-e-reporting-norme-a-partir-de-plusieurs-sources-caisses-logiciel-dedie' WHERE `attributes`.`id` = 428;");

        DB::statement("UPDATE `attributes` SET `code` = 'integration-comptable' WHERE `attributes`.`id` = 429;");

        DB::statement("UPDATE `attributes` SET `code` = 'signature-scellement-des-factures-electroniques-integre' WHERE `attributes`.`id` = 430;");

        DB::statement("UPDATE `attributes` SET `code` = 'application-mobile-disponible' WHERE `attributes`.`id` = 431;");

        DB::statement("UPDATE `attributes` SET `code` = 'confidentialite-des-donnees' WHERE `attributes`.`id` = 432;");

        DB::statement("UPDATE `attributes` SET `code` = 'confidentialite-des-donnees-si-oui-decrire' WHERE `attributes`.`id` = 433;");

        DB::statement("UPDATE `attributes` SET `code` = 'perimetre' WHERE `attributes`.`id` = 439;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-de-placements-proposes-si-oui-preciser-les-types-de-placements' WHERE `attributes`.`id` = 440;");

        DB::statement("UPDATE `attributes` SET `code` = 'solution-de-comptabilite-ou-de-precomptabilite' WHERE `attributes`.`id` = 444;");

        DB::statement("UPDATE `attributes` SET `code` = 'mode-de--tarification' WHERE `attributes`.`id` = 445;");

        DB::statement("UPDATE `attributes` SET `code` = 'les-3-atouts-de-la-solution' WHERE `attributes`.`id` = 446;");

        DB::statement("UPDATE `attributes` SET `code` = 'mode--de-tarification' WHERE `attributes`.`id` = 448;");

        DB::statement("UPDATE `attributes` SET `code` = 'export-de-donnees-personnalisable-si-oui-quels-formats' WHERE `attributes`.`id` = 449;");

        DB::statement("UPDATE `attributes` SET `code` = 'mises-a-jour-gratuites-si-non-montant' WHERE `attributes`.`id` = 450;");

        DB::statement("UPDATE `attributes` SET `code` = 'cout-de-maintenance-inclus-si-non-montant' WHERE `attributes`.`id` = 451;");

        DB::statement("UPDATE `attributes` SET `code` = 'import-de-donnees-si-oui-quel-format' WHERE `attributes`.`id` = 452;");

        DB::statement("UPDATE `attributes` SET `code` = 'plan-de-recuperation-en-cas-de-cyberattaque-si-oui-decrire' WHERE `attributes`.`id` = 453;");

        DB::statement("UPDATE `attributes` SET `code` = 'sur-les-36-cas-dusage-decrits-initialement-dans-les-specifications-combien-en-gere-la-pdp-et-si-oui-pouvez-vous-indiquer-les-n-de-cas-dusage' WHERE `attributes`.`id` = 454;");

        DB::statement("UPDATE `attributes` SET `code` = 'description' WHERE `attributes`.`id` = 455;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-de-placements-proposes' WHERE `attributes`.`id` = 456;");

        DB::statement("UPDATE `attributes` SET `code` = 'factures-au-format-facture-electronique-si-oui-le-format-est-il-compatible' WHERE `attributes`.`id` = 457;");

        DB::statement("UPDATE `attributes` SET `code` = 'edition-de-la-liasse-fiscale' WHERE `attributes`.`id` = 458;");

        DB::statement("UPDATE `attributes` SET `code` = 'nombre-de-pdp-interfacees-avec-la-pdp-avec-lesquelles' WHERE `attributes`.`id` = 459;");

        DB::statement("UPDATE `attributes` SET `code` = 'cible-visee-par-la-pdp-ge-eti-pme-tpe-international' WHERE `attributes`.`id` = 460;");

        DB::statement("UPDATE `attributes` SET `code` = 'pdp-prevue-pour-une-utilisation-par-le-cabinet-et-ses-dossiers-clients' WHERE `attributes`.`id` = 461;");

        DB::statement("UPDATE `attributes` SET `code` = 'la-pdp-fait-partie-dune-suite-logicielle' WHERE `attributes`.`id` = 462;");

        DB::statement("UPDATE `attributes` SET `code` = 'la-pdp-fait-partie-dune-suite-logicielle-si-oui-laquelle' WHERE `attributes`.`id` = 463;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-workflows-de-validation-des-factures' WHERE `attributes`.`id` = 464;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-workflows-de-validation-des-paiements' WHERE `attributes`.`id` = 465;");

        DB::statement("UPDATE `attributes` SET `code` = 'rapprochement-automatique-des-factures-et-paiements-avec-mise-a-jour-du-cycle-de-vie' WHERE `attributes`.`id` = 466;");

        DB::statement("UPDATE `attributes` SET `code` = 'gestion-des-relances-factures-clients-en-retard-de-paiement' WHERE `attributes`.`id` = 467;");

        DB::statement("UPDATE `attributes` SET `code` = 'possibilite-de-saisie-manuelle-des-z-de-caisse-par-jour-et-taux-de-tva' WHERE `attributes`.`id` = 468;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-de-controle-de-validite-des-informations-siren-rib-iban-integre' WHERE `attributes`.`id` = 469;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-complet-de-gestion-commerciale-devis-bdc-facture-integre' WHERE `attributes`.`id` = 470;");

        DB::statement("UPDATE `attributes` SET `code` = 'module-de-financement-des-factures-integre' WHERE `attributes`.`id` = 471;");

        DB::statement("UPDATE `attributes` SET `code` = 'generation-de-tableau-bord-de-suivi-des-paiements-des-factures-clients-et-fournisseurs' WHERE `attributes`.`id` = 472;");

        DB::statement("UPDATE `attributes` SET `code` = 'avec-combien-de-pdp-la-votre-sinterface-t-elle' WHERE `attributes`.`id` = 473;");

        DB::statement("UPDATE `attributes` SET `code` = 'recuperation-simple-de-ses-donnees-pour-le-client-en-cas-de-changement-de-pdp' WHERE `attributes`.`id` = 474;");

        DB::statement("UPDATE `attributes` SET `code` = 'perimetre-de-votre-certification-iso-27001' WHERE `attributes`.`id` = 475;");

        DB::statement("UPDATE `attributes` SET `code` = 'support-situe-en-france' WHERE `attributes`.`id` = 476;");

        DB::statement("UPDATE `attributes` SET `code` = 'formation-des-utilisateurs-proposee' WHERE `attributes`.`id` = 477;");

        DB::statement("UPDATE `attributes` SET `code` = 'hotline-incluse' WHERE `attributes`.`id` = 478;");

        DB::statement("UPDATE `attributes` SET `code` = 'hotline-incluse-si-non-montant' WHERE `attributes`.`id` = 479;");

        DB::statement("UPDATE `attributes` SET `code` = 'quelles-sont-les-pdp-qui-sinterfacent-avec-la-votre' WHERE `attributes`.`id` = 480;");

        DB::statement("UPDATE `attributes` SET `code` = 'permet-lemission-et-la-reception-de-factures-electroniques-dans-des-formats-autres-que-ceux-du-socle-minimal-edifact-si-oui-lesquels' WHERE `attributes`.`id` = 481;");

        DB::statement("UPDATE `attributes` SET `code` = 'preciser-si-la-facturation-est-a-lemission-etou-a-la-reception-de-facture-les-conditions-de-la-gratuite-autre' WHERE `attributes`.`id` = 482;");

        DB::statement("UPDATE `attributes` SET `code` = 'mode-de-tarification' WHERE `attributes`.`id` = 483;");

        DB::statement("UPDATE `attributes` SET `code` = 'descriptif-de-la-garantie-de-confidentialite-des-donnees' WHERE `attributes`.`id` = 484;");

        DB::statement("UPDATE `attributes` SET `code` = 'pre-requis' WHERE `attributes`.`id` = 485;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
