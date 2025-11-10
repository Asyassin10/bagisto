<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Gestion des workflows de validation des paiements', 'select', '', '', '39YF8eqIWnvKLedA', '2025-03-06 13:04:15', '2025-03-06 13:04:15')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 465, 'Gestion des workflows de validation des paiements')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 465, 'Gestion des workflows de validation des paiements')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (465, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 460, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 460, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (465, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 461, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 461, 'non')");


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Service de paiement disponible' WHERE `attributes`.`id` = 251; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 251; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Service de paiement disponible' WHERE `attribute_translations`.`id` = 501; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Service de paiement disponible' WHERE `attribute_translations`.`id` = 502; ");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Rapprochement automatique des factures et paiements avec mise à jour du cycle de vie', 'select', '', '', 'niF8AJfF2bbyydif', '2025-03-06 13:19:45', '2025-03-06 13:19:45')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 466, 'Rapprochement automatique des factures et paiements avec mise à jour du cycle de vie')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 466, 'Rapprochement automatique des factures et paiements avec mise à jour du cycle de vie')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (466, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 462, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 462, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (466, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 463, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 463, 'non')");


        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Gestion des relances factures clients en retard de paiement', 'select', '', '', 'eQksztIvMarY9XSq', '2025-03-06 14:22:57', '2025-03-06 14:22:57')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 467, 'Gestion des relances factures clients en retard de paiement')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 467, 'Gestion des relances factures clients en retard de paiement')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (467, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 464, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 464, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (467, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 465, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 465, 'non')");




        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Possibilité de saisie manuelle des Z de caisse par jour et taux de TVA', 'select', '', '', 'yWc1TPZo34X0btrE', '2025-03-06 14:36:34', '2025-03-06 14:36:34')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 468, 'Possibilité de saisie manuelle des Z de caisse par jour et taux de TVA')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 468, 'Possibilité de saisie manuelle des Z de caisse par jour et taux de TVA')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (468, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 466, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 466, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (468, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 467, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 467, 'non')");



        DB::statement("UPDATE `attributes` SET `admin_name` = 'Génération d\'un e-reporting consolidé à partir de plusieurs sources (caisses, logiciel dédié …)' WHERE `attributes`.`id` = 428; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Génération d\'un e-reporting consolidé à partir de plusieurs sources (caisses, logiciel dédié …)\n' WHERE `attribute_translations`.`id` = 855; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Génération d\'un e-reporting consolidé à partir de plusieurs sources (caisses, logiciel dédié …)\n' WHERE `attribute_translations`.`id` = 856; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Sur les 36 cas d\'usage décrits initialement dans les specifications, combien en gère la PDP ?\n' WHERE `attributes`.`id` = 254; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage décrits initialement dans les specifications, combien en gère la PDP ?\n' WHERE `attribute_translations`.`id` = 507; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage décrits initialement dans les specifications, combien en gère la PDP ?\n' WHERE `attribute_translations`.`id` = 508; ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
