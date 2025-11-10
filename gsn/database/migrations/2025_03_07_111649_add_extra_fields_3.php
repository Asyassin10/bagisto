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

        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Module de contrôle de validité des informations (SIREN, RIB, IBAN... ) intégré', 'select', '', '', 'Kiug1YOiziKltz0J', '2025-03-06 16:04:14', '2025-03-06 16:04:14')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 469, 'Module de contrôle de validité des informations (SIREN, RIB, IBAN... ) intégré')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 469, 'Module de contrôle de validité des informations (SIREN, RIB, IBAN... ) intégré')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (469, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 468, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 468, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (469, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 469, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 469, 'non')");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Module complet de gestion commerciale (devis, Bdc, facture…) intégré', 'select', '', '', 'LG5gAmC3mI0Ywbmn', '2025-03-06 16:08:06', '2025-03-06 16:08:06')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 470, 'Module complet de gestion commerciale (devis, Bdc, facture…) intégré')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 470, 'Module complet de gestion commerciale (devis, Bdc, facture…) intégré')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (470, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 470, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 470, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (470, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 471, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 471, 'non')");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Module de financement des factures intégré', 'select', '', '', 'fJx0VwKa6ig8B5m3', '2025-03-06 16:18:51', '2025-03-06 16:18:51')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 471, 'Module de financement des factures intégré')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 471, 'Module de financement des factures intégré')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (471, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 472, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 472, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (471, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 473, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 473, 'non')");


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Service d\'archivage des factures intégré' WHERE `attributes`.`id` = 256; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Service d\'archivage des factures intégré' WHERE `attribute_translations`.`id` = 511; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Service d\'archivage des factures intégré' WHERE `attribute_translations`.`id` = 512; ");


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Signature / scellement des factures électroniques intégré' WHERE `attributes`.`id` = 430; ");

        DB::statement("UPDATE `attribute_translations` SET `name` = 'Signature / scellement des factures électroniques intégré' WHERE `attribute_translations`.`id` = 859; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Signature / scellement des factures électroniques intégré' WHERE `attribute_translations`.`id` = 860; ");


        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Génération de tableau bord de suivi des paiements des factures clients et fournisseurs', 'select', '', '', 'prvt2Qgq6EYZU6YC', '2025-03-06 16:40:45', '2025-03-06 16:40:45')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 472, 'Génération de tableau bord de suivi des paiements des factures clients et fournisseurs')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 472, 'Génération de tableau bord de suivi des paiements des factures clients et fournisseurs')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (472, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 474, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 474, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (472, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 475, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 475, 'non')");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `validation`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Avec combien de PDP la vôtre s\'interface-t-elle','text' ,'', 'numeric', '', '', 'kaHcHDhZl2NkwyEe', 0, '2025-03-06 16:43:24', '2025-03-06 16:43:24')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 473, 'Avec combien de PDP la vôtre s\'interface-t-elle ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 473, 'Avec combien de PDP la vôtre s\'interface-t-elle ?')");

        DB::statement("UPDATE `attributes` SET `admin_name` = 'Votre PDP est point d\'accès PEPPOL' WHERE `attributes`.`id` = 264; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Votre PDP est point d\'accès PEPPOL' WHERE `attribute_translations`.`id` = 527; ");

        DB::statement("UPDATE `attribute_translations` SET `name` = 'Votre PDP est point d\'accès PEPPOL' WHERE `attribute_translations`.`id` = 528; ");


        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Récupération simple de ses données pour le client en cas de changement de PDP', 'select', '', '', 'RpxnoCVIBBsXZfh4', '2025-03-07 01:02:56', '2025-03-07 01:02:56')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 474, 'Récupération simple de ses données pour le client en cas de changement de PDP')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 474, 'Récupération simple de ses données pour le client en cas de changement de PDP')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (474, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 476, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 476, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (474, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 477, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 477, 'non')");

        DB::statement("UPDATE `attributes` SET `admin_name` = 'Intégration comptable' WHERE `attributes`.`id` = 429; ");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Périmètre de votre certification ISO 27001', 'text', '', '', '', 'kJp6tE47sxnqmF6w', 0, '2025-03-07 01:06:18', '2025-03-07 01:06:18')");


        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 475, 'Périmètre de votre certification ISO 27001')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 475, 'Périmètre de votre certification ISO 27001')");


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Inscription sur la liste des immatriculations provisoires PDP de la DGFiP' WHERE `attributes`.`id` = 267; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Inscription sur la liste des immatriculations provisoires PDP de la DGFiP' WHERE `attribute_translations`.`id` = 533; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Inscription sur la liste des immatriculations provisoires PDP de la DGFiP' WHERE `attribute_translations`.`id` = 534; ");


        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Le support est-t-il situé en France ?','select', '', '', 'BuDiG3wXmdmzHxvp', '2025-03-07 01:11:38', '2025-03-07 01:11:38')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 476, 'Le support est-t-il situé en France ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 476, 'Le support est-t-il situé en France ?')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (476, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 478, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 478, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (476, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 479, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 479, 'non')");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Formation des utilisateurs proposée', 'select', '', '', 'fkmJc6DAudSvs5fj', '2025-03-07 01:13:36', '2025-03-07 01:13:36')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 477, 'Formation des utilisateurs proposée')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 477, 'Formation des utilisateurs proposée')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (477, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 480, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 480, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (477, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 481, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 481, 'non')");




        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `code`, `updated_at`, `created_at`) values ('Hotline incluse','select', '', '', 'w2qfK4o8FvoWuToO', '2025-03-07 01:15:52', '2025-03-07 01:15:52')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 478, 'Hotline incluse ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 478, 'Hotline incluse ?')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (478, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 482, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 482, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (478, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 483, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 483, 'non')");



        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `validation`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Hotline incluse , si Non, montant ','text' ,'', 'numeric', '', '', '7kUQKbxiZq9m1h5j', 0, '2025-03-07 01:17:38', '2025-03-07 01:17:38')");

        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 479, 'Hotline incluse , si Non, montant ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 479, 'Hotline incluse , si Non, montant ?')");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
