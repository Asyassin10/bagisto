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
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Solution de comptabilité ou de précomptabilité' WHERE `attributes`.`id` = 444;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Prévisionnels CA' WHERE `attributes`.`id` = 326;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Gestion de secteurs particuliers (BTP, associations, ...) , Si oui lesquels ?' WHERE `attributes`.`id` = 43;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'API disponibles , Si oui lesquelles?' WHERE `attributes`.`id` = 55; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Import de données , Si oui quels formats ?' WHERE `attributes`.`id` = 127; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Export de données personnalisable ,Si oui quels formats ?' WHERE `attributes`.`id` = 449; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Export de données personnalisable ,Si oui quels formats ?' WHERE `attributes`.`id` = 386; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel de facturation , Si oui lesquels ?' WHERE `attributes`.`id` = 62; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec des PDP , Si oui lesquels ?' WHERE `attributes`.`id` = 64; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel d’achat , Si oui lesquels ?' WHERE `attributes`.`id` = 67; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un système de conservation ou d’archivage , Si oui lesquels ?' WHERE `attributes`.`id` = 70; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un coffre-fort, Si oui lesquels ?' WHERE `attributes`.`id` = 72; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un CRM / GRC , Si oui lesquels ?' WHERE `attributes`.`id` = 74; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec des solutions métier , Si oui lesquelles ?' WHERE `attributes`.`id` = 76; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Mise à jour avec les nouvelles règlementations , Si oui, quelle fréquence' WHERE `attributes`.`id` = 79; ");
        DB::statement(query: "UPDATE `attribute_options` set `admin_name` = 'Androïd' where `id` = 430  ");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'Androïd' where `id` = 860  ");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'Androïd' where `id` = 859  ");
        DB::statement(query: "UPDATE `attribute_options` set `admin_name` = 'IOS' where `id` = 431");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'IOS' where `id` = 862");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'IOS' where `id` = 861");
        DB::statement(query: "UPDATE `attribute_options` set `admin_name` = 'IOS et Androïd\"' where `id` = 432");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'IOS et Androïd\"' where `id` = 864");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'IOS et Androïd\"' where `id` = 863");
        DB::statement(query: "UPDATE `attribute_options` set `admin_name` = 'Aucune' where `id` = 443");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'Aucune' where `id` = 886");
        DB::statement(query: "UPDATE `attribute_option_translations` set `label` = 'Aucune' where `id` = 885");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Plan de récupération en cas de cyber attaque , si oui décrire' WHERE `attributes`.`id` = 453; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Plan de récupération en cas de cyber attaque , si oui décrire' WHERE `attributes`.`id` = 84; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Hot line , si oui horaires ?' WHERE `attributes`.`id` = 87; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Coût de maintenance inclus , si non montant ?' WHERE `attributes`.`id` = 451; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Mises à jour gratuites, si non montant ?' WHERE `attributes`.`id` = 450; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Les 3 atouts de la solution' WHERE `attributes`.`id` = 446; ");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
