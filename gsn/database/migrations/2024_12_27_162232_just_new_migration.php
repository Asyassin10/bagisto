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
        DB::statement("UPDATE attributes SET type = 'select' WHERE attributes.id = 183;");
        DB::statement("insert into `attribute_options` (`attribute_id`, `sort_order`, `admin_name`) values (183, 0, 'oui');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 452, 'oui');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 452, 'oui');");
        DB::statement("insert into `attribute_options` (`attribute_id`, `sort_order`, `admin_name`) values (183, 1, 'non');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('fr', 453, 'non');");
        DB::statement("insert into `attribute_option_translations` (`locale`, `attribute_option_id`, `label`) values ('en', 453, 'non');");
        DB::statement("UPDATE `attributes` SET `max_length` = NULL WHERE `attributes`.`id` = 457; ");

        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 36 and `attribute_id` in (1)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 36 and `attribute_id` in (2)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 36 and `attribute_id` in (3)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 37 and `attribute_id` in (455)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 37 and `attribute_id` in (9)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 38 and `attribute_id` in (16)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 38 and `attribute_id` in (17)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (175)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (395)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (396)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (178)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (397)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (180)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (181)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (182)");
        DB::statement("update `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (183)");
        DB::statement("update `attribute_group_mappings` set `position` = 10 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (457)");
        DB::statement("update `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (184)");
        DB::statement("update `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (398)");
        DB::statement("update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (399)");
        DB::statement("update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (400)");
        DB::statement("update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (401)");
        DB::statement("update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (402)");
        DB::statement("update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (403)");
        DB::statement("update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (404)");
        DB::statement("update `attribute_group_mappings` set `position` = 19 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (405)");
        DB::statement("update `attribute_group_mappings` set `position` = 20 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (241)");
        DB::statement("update `attribute_group_mappings` set `position` = 21 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (195)");
        DB::statement("update `attribute_group_mappings` set `position` = 22 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (406)");
        DB::statement("update `attribute_group_mappings` set `position` = 23 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (407)");
        DB::statement("update `attribute_group_mappings` set `position` = 24 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (198)");
        DB::statement("update `attribute_group_mappings` set `position` = 25 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (408)");
        DB::statement("update `attribute_group_mappings` set `position` = 26 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (409)");
        DB::statement("update `attribute_group_mappings` set `position` = 27 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (410)");
        DB::statement("update `attribute_group_mappings` set `position` = 28 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (411)");
        DB::statement("update `attribute_group_mappings` set `position` = 29 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (329)");
        DB::statement("update `attribute_group_mappings` set `position` = 30 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (52)");
        DB::statement("update `attribute_group_mappings` set `position` = 31 where `attribute_group_mappings`.`attribute_group_id` = 149 and `attribute_id` in (53)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (349)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (127)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (385)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (386)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (330)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (55)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (204)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 150 and `attribute_id` in (205)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 151 and `attribute_id` in (339)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (151, 340, 2)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (151, 79, 3)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 152 and `attribute_id` in (341)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 152 and `attribute_id` in (431)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (138)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (342)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (84)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (412)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (432)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 153 and `attribute_id` in (433)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (343)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (87)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (344)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 154 and `attribute_id` in (345)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (445)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (346)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (451)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (347)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 155 and `attribute_id` in (450)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 156 and `attribute_id` in (446)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 156 and `attribute_id` in (152)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 156 and `attribute_id` in (348)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (11)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (13)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (14)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 39 and `attribute_id` in (15)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 40 and `attribute_id` in (22)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 41 and `attribute_id` in (7)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 41 and `attribute_id` in (8)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 42 and `attribute_id` in (28)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
