<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Récupération des relevés bancaires' WHERE `attributes`.`id` = 313;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Certifié eIDAS' WHERE `attributes`.`id` = 315;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Niveau de signature' WHERE `attributes`.`id` = 306;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Modalité de collecte' WHERE `attributes`.`id` = 307;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre maximum de documents par collecte' WHERE `attributes`.`id` = 308;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre maximum de signataires par collecte' WHERE `attributes`.`id` = 309; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Formats des documents à signer' WHERE `attributes`.`id` = 310; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Importation et exploitation d\'Open data' WHERE `attributes`.`id` = 159; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Relance automatique des tâches' WHERE `attributes`.`id` = 180; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Factures au format facture électronique' WHERE `attributes`.`id` = 183;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Import de données' WHERE `attributes`.`id` = 349; ;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Import de données , Si oui, quel format ?' WHERE `attributes`.`id` = 127; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel de comptabilité , Si oui, Lesquels ?' WHERE `attributes`.`id` = 205; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel de comptabilité' WHERE `attributes`.`id` = 204; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Mise à jour avec les nouvelles règlementations' WHERE `attributes`.`id` = 135;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires' WHERE `attributes`.`id` = 249;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires , si oui Lesquels ?' WHERE `attributes`.`id` = 248; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires , si oui Lesquels ?' WHERE `attributes`.`id` = 249; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires' WHERE `attributes`.`id` = 248; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel) ' WHERE `attributes`.`id` = 259; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre de PDP interfacées avc la PDP' WHERE `attributes`.`id` = 262; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Certification PEPPOL' WHERE `attributes`.`id` = 264; ");
        DB::statement(query: "DELETE from `attributes` where `id` = 263");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Intégration avec des solutions comptables' WHERE `attributes`.`id` = 429; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Intégration avec des solutions comptables , si Oui, avec quels éditeurs ?' WHERE `attributes`.`id` = 266; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Immatriculé sous réserve par la DGFiP' WHERE `attributes`.`id` = 267;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Paramétrage des droits utilisateurs' WHERE `attributes`.`id` = 412; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Prévisionnels de CA' WHERE `attributes`.`id` = 326; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Emission des règlements ' WHERE `attributes`.`id` = 294; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel comptable, Si oui, lesquels ?' WHERE `attributes`.`id` = 300; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel comptable' WHERE `attributes`.`id` = 299; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel de gestion / caisse' WHERE `attributes`.`id` = 301; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Benschmark' WHERE `attributes`.`id` = 387; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Accès par le client à son espace' WHERE `attributes`.`id` = 382; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Présentation de la solution' WHERE `attributes`.`id` = 157; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Solution logiciel' WHERE `attributes`.`id` = 379; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Solution logiciel ? Si non, précisez le type de solution ?' WHERE `attributes`.`id` = 155; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Fonction principale de la solution' WHERE `attributes`.`id` = 156; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
