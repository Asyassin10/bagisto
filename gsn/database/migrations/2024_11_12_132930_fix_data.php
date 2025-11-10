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
        DB::statement(query: "UPDATE `category_translations` SET `name` = 'Signature électronique, Télétransmission, archivage' WHERE `category_translations`.`id` = 23; ");
        DB::statement(query: "UPDATE `category_translations` SET `name` = 'Signature électronique, Télétransmission, archivage' WHERE `category_translations`.`id` = 24; ");
        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Double accès cabinet et client' WHERE `attributes`.`id` = 371; ");
        DB::statement(query:"INSERT INTO `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `is_alpha_numeric`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Factures au format facture électronique , si oui le format est-il compatible','text', '', '', '', 1, 'ZGKdC3BNhf52vBDu', 0, '2024-11-12 15:01:29', '2024-11-12 15:01:29')  ");
        DB::statement(query:"INSERT INTO `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 457, 'Factures au format facture électronique , si oui le format est-il compatible ?') ");
        DB::statement(query:"INSERT INTO `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 457, 'Factures au format facture électronique , si oui le format est-il compatible ?')  ");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 36 and `attribute_id` in (1)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 36 and `attribute_id` in (2)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 36 and `attribute_id` in (3)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 37 and `attribute_id` in (455)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 37 and `attribute_id` in (9)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 38 and `attribute_id` in (16)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 38 and `attribute_id` in (17)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (175)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (395)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (396)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (178)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (397)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (180)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (181)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (182)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (183)");
        DB::statement(query:"INSERT into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (149, 457, 10)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (184)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (398)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (399)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (400)");
        DB::statement(query:"UPDATE `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (401);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (402);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (403);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (404);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 19 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (405);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 20 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (241);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 21 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (195);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 22 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (406);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 23 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (407);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 24 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (198);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 25 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (408);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 26 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (409);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 27 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (410);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 28 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (411);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 29 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (329);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 30 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (52);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 31 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (53);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (349);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (127);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (385);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (386);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (330);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (55);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (204);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (205);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 151 and `attribute_id` in (339);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 151 and `attribute_id` in (135);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 152 and `attribute_id` in (341);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 152 and `attribute_id` in (431);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (138);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (342);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (84);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (412);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (432);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (433);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (343);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (87);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (344);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (345);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (445);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (346);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (451);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (347);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (450);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 156 and `attribute_id` in (446);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 156 and `attribute_id` in (152);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 156 and `attribute_id` in (348);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (11);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (13);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (14);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (15);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 40 and `attribute_id` in (22);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 41 and `attribute_id` in (7);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 41 and `attribute_id` in (8);");
        DB::statement(query:"update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 42 and `attribute_id` in (28);");


        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Peut envoyer et recevoir des factures électroniques sous des formats autres que ceux du Socle minimal' WHERE `attributes`.`id` = 246; ");
        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Partage des accès avec les collaborateurs, DAF, EC …' WHERE `attributes`.`id` = 425; ");
        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Tableaux de bord' WHERE `attributes`.`id` = 388; ");
        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Rapports et analyses' WHERE `attributes`.`id` = 393; ");

        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Comparatifs des options' WHERE `attributes`.`id` = 381; ");



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
