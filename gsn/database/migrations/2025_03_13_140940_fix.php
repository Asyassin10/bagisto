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
        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing , Si oui, lesquels ?','text', '', '', '', 'Qv2v74t1KPpl7GWa', 0, '2025-03-13 14:07:37', '2025-03-13 14:07:37')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 481, 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing , Si oui, lesquels ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 481, 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing , Si oui, lesquels ?')");
        DB::statement("delete from `attribute_options` where `id` = 141");
        DB::statement("delete from `attribute_options` where `id` = 449");
        DB::statement("insert into `attribute_options` (`attribute_id`, `sort_order`, `admin_name`) values (251, 2, 'Banque traditionnelle')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 484, 'Banque traditionnelle')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 484, 'Banque traditionnelle')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `sort_order`, `admin_name`) values (251, 3, 'Neobanque')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 485, 'Neobanque')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 485, 'Neobanque')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `sort_order`, `admin_name`) values (251, 4, 'les 2')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 486, 'les 2')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 486, 'les 2')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `sort_order`, `admin_name`) values (251, 5, 'aucun')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 487, 'aucun')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 487, 'aucun')");

        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Mode de tarification , Si gratuit, préciser les conditions de gratuité ?','text', '', '', '', 'QzLtH7rwnv80zArd', 0, '2025-03-13 14:35:46', '2025-03-13 14:35:46')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 482, 'Mode de tarification , Si gratuit, préciser les conditions de gratuité , Si gratuit, préciser les conditions de gratuité ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 482, 'Mode de tarification , Si gratuit, préciser les conditions de gratuité , Si gratuit, préciser les conditions de gratuité ?')");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Mode de tarification', 'select', '', '', 'wEs1gD9yCNHw2EtQ', '2025-03-13 14:49:35', '2025-03-13 14:49:35')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 483, 'Mode de tarification')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 483, 'Mode de tarification')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (483, 'à l\'usage')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 488, 'à l\'usage')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 488, 'à l\'usage')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (483, 'abonnement')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 489, 'abonnement')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 489, 'abonnement')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (483, 'gratuit')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 490, 'gratuit')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 490, 'gratuit')");


        //  /  /











    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
