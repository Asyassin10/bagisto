<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Gestion des carrières et entretiens' WHERE `attributes`.`id` = 104; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Modèle de paie par catégories de salariés' WHERE `attributes`.`id` = 107;");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Statistiques et tableaux de bord personnalisés' WHERE `attributes`.`id` = 360; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Contrôle et assistance aux zones de saisie obligatoires en DSN' WHERE `attributes`.`id` = 364; ");
        //  DB::statement("UPDATE `attributes` SET `admin_name` = Paramétrage par l'utilisateur des lignes du bulletin de paie' WHERE `attributes`.`id` = 369;");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Paramétrage par l\\'utilisateur des lignes du bulletin de paie' WHERE `attributes`.`id` = 369;");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 15 and `attribute_id` in (1)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 15 and `attribute_id` in (2)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 15 and `attribute_id` in (455)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 15 and `attribute_id` in (3)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 16 and `attribute_id` in (9)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 17 and `attribute_id` in (16)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 17 and `attribute_id` in (17)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (320)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (101)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (358)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (359)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (104)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (40)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (106)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (107)");
        DB::statement("update `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (108)");
        DB::statement("update `attribute_group_mappings` set `position` = 10 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (360)");
        DB::statement("update `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (361)");
        DB::statement("update `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (111)");
        DB::statement("update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (362)");
        DB::statement("update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (363)");
        DB::statement("update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (364)");
        DB::statement("update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (365)");
        DB::statement("update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (366)");
        DB::statement("update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (367)");
        DB::statement("update `attribute_group_mappings` set `position` = 19 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (368)");
        DB::statement("update `attribute_group_mappings` set `position` = 20 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (369)");
        DB::statement("update `attribute_group_mappings` set `position` = 21 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (120)");
        DB::statement("update `attribute_group_mappings` set `position` = 22 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (121)");
        DB::statement("update `attribute_group_mappings` set `position` = 23 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (370)");
        DB::statement("update `attribute_group_mappings` set `position` = 24 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (123)");
        DB::statement("update `attribute_group_mappings` set `position` = 25 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (52)");
        DB::statement("update `attribute_group_mappings` set `position` = 26 where `attribute_group_mappings`.`attribute_group_id` = 85 and `attribute_id` in (53)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 86 and `attribute_id` in (349)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 86 and `attribute_id` in (127)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 86 and `attribute_id` in (385)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 86 and `attribute_id` in (386)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 86 and `attribute_id` in (132)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 86 and `attribute_id` in (131)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 87 and `attribute_id` in (339)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 87 and `attribute_id` in (134)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (87, 340, 3) ;");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (87, 79, 4) ;");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 88 and `attribute_id` in (341)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 88 and `attribute_id` in (431)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 89 and `attribute_id` in (138)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 89 and `attribute_id` in (342)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 89 and `attribute_id` in (84)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 89 and `attribute_id` in (432)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 89 and `attribute_id` in (433)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 90 and `attribute_id` in (343)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 90 and `attribute_id` in (87)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 90 and `attribute_id` in (344)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 90 and `attribute_id` in (345)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 91 and `attribute_id` in (448)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 91 and `attribute_id` in (346)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 91 and `attribute_id` in (451)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 91 and `attribute_id` in (347)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 91 and `attribute_id` in (450)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 92 and `attribute_id` in (446)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 92 and `attribute_id` in (152)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 92 and `attribute_id` in (348)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 18 and `attribute_id` in (11)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 18 and `attribute_id` in (13)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 18 and `attribute_id` in (14)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 18 and `attribute_id` in (15)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 19 and `attribute_id` in (22)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 20 and `attribute_id` in (7)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 20 and `attribute_id` in (8)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 21 and `attribute_id` in (28)");




        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
