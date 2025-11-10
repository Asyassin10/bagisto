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
        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Cible visée par la PDP (GE / ETI / PME / TPE / international)', 'text', '', '', '', '3BlnHKhXvk4OMhmc', 0, '2025-03-07 10:27:32', '2025-03-07 10:27:32')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 460, 'Cible visée par la PDP (GE / ETI / PME / TPE / international)')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 460, 'Cible visée par la PDP (GE / ETI / PME / TPE / international)')");

        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('PDP prévue pour une utilisation par le cabinet et ses dossiers clients', 'select', '', '', '4bsYr4soetVFFKqS', '2025-03-07 10:38:02', '2025-03-07 10:38:02');");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 461, 'PDP prévue pour une utilisation par le cabinet et ses dossiers clients')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 461, 'PDP prévue pour une utilisation par le cabinet et ses dossiers clients')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (461, 'oui');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 454, 'oui');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 454, 'oui');");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (461, 'non');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 455, 'non');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 455, 'non');");




        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('La PDP fait partie d\'une suite logicielle', 'select', '', '', 'Nbl6kGE3V7faulaZ', '2025-03-07 10:40:47', '2025-03-07 10:40:47')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 462, 'La PDP fait partie d\'une suite logicielle')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 462, 'La PDP fait partie d\'une suite logicielle')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (462, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 456, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 456, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (462, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 457, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 457, 'non')");





        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('La PDP fait partie d\'une suite logicielle , Si oui laquelle ','text', '', '', '', 'r4AJfUCbShkAVrSj', 0, '2025-03-07 10:45:40', '2025-03-07 10:45:40')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 463, 'La PDP fait partie d\'une suite logicielle , Si oui laquelle ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 463, 'La PDP fait partie d\'une suite logicielle , Si oui laquelle ?')");


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Emission et réception des factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis)' WHERE `attributes`.`id` = 245; ");

        DB::statement("UPDATE `attribute_translations` SET `name` = 'Emission et réception des factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis)' WHERE `attribute_translations`.`id` = 489; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Emission et réception des factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis)' WHERE `attribute_translations`.`id` = 490; ");




        DB::statement("UPDATE `attributes` SET `admin_name` = 'Module de saisie en ligne des factures disponible pour les clients du cabinet' WHERE `attributes`.`id` = 247; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Module de saisie en ligne des factures disponible pour les clients du cabinet' WHERE `attribute_translations`.`id` = 493; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Module de saisie en ligne des factures disponible pour les clients du cabinet' WHERE `attribute_translations`.`id` = 494; ");


        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Gestion des workflows de validation des factures', 'select', '', '', 'gmofOMLS5mj2kpOM', '2025-03-06 12:56:59', '2025-03-06 12:56:59')");

        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 464, 'Gestion des workflows de validation des factures')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 464, 'Gestion des workflows de validation des factures')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (464, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 458, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 458, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (464, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 459, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 459, 'non')");






















    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
