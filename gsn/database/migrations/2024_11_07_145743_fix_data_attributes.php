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
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Rapprochement bancaire et lettrage' WHERE `attributes`.`id` = 32;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Cachet qualifié ou Signature électronique' WHERE `attributes`.`id` = 319;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Module OCR intégré' WHERE `attributes`.`id` = 41;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Analyses prédictives' WHERE `attributes`.`id` = 328;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un CRM / GRC' WHERE `attributes`.`id` = 337;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un CRM / GRC , si Oui, lesquels ?' WHERE `attributes`.`id` = 74;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Conforme RGPD' WHERE `attributes`.`id` = 339;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Mise à jour avec les nouvelles règlementations' WHERE `attributes`.`id` = 340;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Mise à jour avec les nouvelles règlementations , si oui à quelle fréquence ?' WHERE `attributes`.`id` = 79;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Mode de tarification ' WHERE `attributes`.`id` = 448; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Mode de tarification' WHERE `attributes`.`id` = 445;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Gestion des participation et intéressement' WHERE `attributes`.`id` = 358;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Duplication d\'éléments (fiche salarié, rubrique de paie, ...)' WHERE `attributes`.`id` = 359;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Coffre-fort électronique et archivage électronique des bulletins de paie' WHERE `attributes`.`id` = 111;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Nombre de conventions collectives gérées' WHERE `attributes`.`id` = 121;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Gestion de régimes spéciaux ' WHERE `attributes`.`id` = 370;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Gestion de régimes spéciaux , Si oui, lesquels ?' WHERE `attributes`.`id` = 123;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Années de conservation de l\'historique' WHERE `attributes`.`id` = 134;");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Prérequis' WHERE `attributes`.`id` = 152;");
        /*  DB::statement(query: "
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 50 and `attribute_id` in (1)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 50 and `attribute_id` in (2)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 50 and `attribute_id` in (3)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 51 and `attribute_id` in (455)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 51 and `attribute_id` in (9)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 52 and `attribute_id` in (16)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 52 and `attribute_id` in (17)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (225)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (226)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (351)
            update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (352)
            update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (229)
            update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (353)
            update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (232)
            update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (233)
            update `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (355)
            update `attribute_group_mappings` set `position` = 10 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (235)
            update `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (236)
            update `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (356)
            update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (357)
            update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (239)
            update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (240)
            update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (241)
            update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (52)
            update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (53)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (330)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (55)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (349)
            update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (127)
            update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (385)
            update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (386)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 103 and `attribute_id` in (339)
            insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (103, 340, 2)
            insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (103, 79, 3)
            delete from `attribute_group_mappings` where `attribute_group_mappings`.`attribute_group_id` = 103 and `attribute_group_mappings`.`attribute_id` in (135)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 104 and `attribute_id` in (341)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 104 and `attribute_id` in (431)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (138)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (342)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (84)
            update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (432)
            update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (433)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (343)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (87)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (344)
            update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (345)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (445)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (346)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (451)
            update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (347)
            update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (450)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 108 and `attribute_id` in (446)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 108 and `attribute_id` in (152)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 108 and `attribute_id` in (348)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (11)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (13)
            update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (14)
            update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (15)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 54 and `attribute_id` in (22)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 55 and `attribute_id` in (7)
            update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 55 and `attribute_id` in (8)
            update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 56 and `attribute_id` in (28)
        ");
        */
        DB::statement(query: "UPDATE `attribute_families` SET `name` = 'Signature électronique, Télétransmission, archivage' WHERE `attribute_families`.`id` = 12;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
