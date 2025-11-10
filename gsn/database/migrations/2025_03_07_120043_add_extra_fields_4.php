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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Sur les 36 cas d\'usage décrits initialement dans les specifications, combien en gère la PDP ?, et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attributes`.`id` = 454; ");

        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage décrits initialement dans les specifications, combien en gère la PDP ?, et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attribute_translations`.`id` = 907; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage décrits initialement dans les specifications, combien en gère la PDP ?, et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attribute_translations`.`id` = 908; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Création ou transformation d\'une facture au format Factur-X' WHERE `attributes`.`id` = 242; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Création ou transformation d\'une facture au format Factur-X' WHERE `attribute_translations`.`id` = 483; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Création ou transformation d\'une facture au format Factur-X' WHERE `attribute_translations`.`id` = 484; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Création ou transformation d\'une facture au format CII' WHERE `attributes`.`id` = 426; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Création ou transformation d\'une facture au format CII' WHERE `attribute_translations`.`id` = 851; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Création ou transformation d\'une facture au format CII' WHERE `attribute_translations`.`id` = 852; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Création ou transformation d\'une facture au format UBL' WHERE `attributes`.`id` = 427; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Création ou transformation d\'une facture au format UBL' WHERE `attribute_translations`.`id` = 853; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Création ou transformation d\'une facture au format UBL' WHERE `attribute_translations`.`id` = 854; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Signature / scellement des factures électroniques intégré , si Oui : solution utilisée ?' WHERE `attributes`.`id` = 258; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Signature / scellement des factures électroniques intégré , si Oui : solution utilisée ?' WHERE `attribute_translations`.`id` = 515; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Signature / scellement des factures électroniques intégré , si Oui : solution utilisée ?' WHERE `attribute_translations`.`id` = 516; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Intégration comptable , si Oui, avec quels éditeurs ?' WHERE `attributes`.`id` = 266; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
