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


	DB::statement("update `attribute_translations` set `name` = 'Module OCR intégré' where `id` = 81 ");
	DB::statement("update `attribute_translations` set `name` = 'Module OCR intégré' where `id` = 82");
        //
        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `is_required`, `is_visible_on_front`, `code`, `updated_at`, `created_at`) values ('Edition de la liasse fiscale', 'select', '', '', 1, 1, 'rLoLXJEeBZJuqeeH', '2024-12-26 12:36:14', '2024-12-26 12:36:14')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 458, 'Edition de la liasse fiscale')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 458, 'Edition de la liasse fiscale')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (458, 'oui')");
        DB::statement("insert into `attribute_options` (`attribute_id`, `admin_name`) values (458, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 450, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 450, 'oui')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 451, 'non')");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 451, 'non')");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Peut envoyer et recevoir des factures électroniques sous des formats autres que ceux du Socle minimal ,Si oui, lesquels ?' WHERE `attributes`.`id` = 250; ");
        DB::statement(" update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 8 and `attribute_id` in (1)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 8 and `attribute_id` in (2)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 8 and `attribute_id` in (3)");

        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 9 and `attribute_id` in (455)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 9 and `attribute_id` in (9)");

        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 10 and `attribute_id` in (16)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 10 and `attribute_id` in (17)");

        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (444)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (316)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (317)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (32)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (318)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (319)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (320)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (321)");
        DB::statement("update `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (37)");
        DB::statement("update `attribute_group_mappings` set `position` = 10 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (322)");
        DB::statement("update `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (39)");
        DB::statement("update `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (40)");
        DB::statement("update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (41)");
        DB::statement("update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (323)");
        DB::statement("update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (43)");


        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (93, 458, 16)");
        DB::statement("update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (325)");
        DB::statement("update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (46)");
        DB::statement("update `attribute_group_mappings` set `position` = 19 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (326)");
        DB::statement("update `attribute_group_mappings` set `position` = 20 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (327)");
        DB::statement("update `attribute_group_mappings` set `position` = 21 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (328)");
        DB::statement("update `attribute_group_mappings` set `position` = 22 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (329)");
        DB::statement("update `attribute_group_mappings` set `position` = 23 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (51)");
        DB::statement("update `attribute_group_mappings` set `position` = 24 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (52)");
        DB::statement("update `attribute_group_mappings` set `position` = 25 where `attribute_group_mappings`.`attribute_group_id` = 93 and `attribute_id` in (53)");


        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (330)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (55)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (349)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (127)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (385)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (386)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (60)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (331)");
        DB::statement("update `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (62)");
        DB::statement("update `attribute_group_mappings` set `position` = 10 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (332)");
        DB::statement("update `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (64)");
        DB::statement("update `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (333)");


        /* DB::statement("update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (67);update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (334);update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (335);update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (70);update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (336);update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (72);update `attribute_group_mappings` set `position` = 19 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (337);update `attribute_group_mappings` set `position` = 20 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (74);update `attribute_group_mappings` set `position` = 21 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (338);update `attribute_group_mappings` set `position` = 22 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (76);");*/

        DB::statement("update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (67)");
        DB::statement("update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (334)");
        DB::statement("update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (335)");
        DB::statement("update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (70)");
        DB::statement("update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (336)");
        DB::statement("update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (72)");
        DB::statement("update `attribute_group_mappings` set `position` = 19 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (337)");
        DB::statement("update `attribute_group_mappings` set `position` = 20 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (74)");
        DB::statement("update `attribute_group_mappings` set `position` = 21 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (338)");
        DB::statement("update `attribute_group_mappings` set `position` = 22 where `attribute_group_mappings`.`attribute_group_id` = 94 and `attribute_id` in (76)");


        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 95 and `attribute_id` in (339)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 95 and `attribute_id` in (340)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 95 and `attribute_id` in (79)");

        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 96 and `attribute_id` in (341)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 96 and `attribute_id` in (431)");



        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 97 and `attribute_id` in (82)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 97 and `attribute_id` in (342)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 97 and `attribute_id` in (84)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 97 and `attribute_id` in (432)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 97 and `attribute_id` in (433)");






















        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 98 and `attribute_id` in (343)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 98 and `attribute_id` in (87)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 98 and `attribute_id` in (344)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 98 and `attribute_id` in (345)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 99 and `attribute_id` in (445)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 99 and `attribute_id` in (346)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 99 and `attribute_id` in (451)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 99 and `attribute_id` in (347)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 99 and `attribute_id` in (450)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 100 and `attribute_id` in (446)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 100 and `attribute_id` in (152)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 100 and `attribute_id` in (348)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (11)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (13)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (14)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (15)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (11)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (13)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (14)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 11 and `attribute_id` in (15)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 12 and `attribute_id` in (22)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 13 and `attribute_id` in (7)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 13 and `attribute_id` in (8)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 14 and `attribute_id` in (28)");
        DB::statement("update `attribute_translations` set `name` = 'Utilise un RPA (Robotic Process Automation)' where `id` = 102");
        DB::statement("update `attribute_translations` set `name` = 'Utilise un RPA (Robotic Process Automation)' where `id` = 101");
        DB::statement("update `attributes` set `admin_name` = 'Utilise un RPA (Robotic Process Automation)', `attributes`.`updated_at` = '2024-12-26 22:36:18' where `id` = 51");
        DB::statement("DELETE  FROM `attributes` WHERE `id` = 135 ");
        DB::statement("UPDATE `attribute_options` SET `admin_name` = 'IOS et Androïd' WHERE `attribute_options`.`id` = 432; ");
        DB::statement("UPDATE `attribute_option_translations` SET `label` = 'IOS et Androïd' WHERE `attribute_option_translations`.`id` = 864;");
        DB::statement("UPDATE `attribute_option_translations` SET `label` = 'IOS et Androïd' WHERE `attribute_option_translations`.`id` = 863;");
        DB::statement("update `attribute_translations` set `name` = 'Solution de comptabilité ou de précomptabilité' where `id` = 887");
        DB::statement("update `attribute_translations` set `name` = 'Solution de comptabilité ou de précomptabilité' where `id` = 888");





	DB::statement("update `attribute_translations` set `name` = 'Rapprochement bancaire et lettrage' where `id` = 63;");
	DB::statement("update `attribute_translations` set `name` = 'Rapprochement bancaire et lettrage' where `id` = 64");








    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
