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
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 50 and `attribute_id` in (1)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 50 and `attribute_id` in (2)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 50 and `attribute_id` in (3)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 51 and `attribute_id` in (455)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 51 and `attribute_id` in (9)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 52 and `attribute_id` in (16)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 52 and `attribute_id` in (17)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (225)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (226)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (351)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (352)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (229)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (353)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (232)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (233)");
        DB::statement("update `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (355)");
        DB::statement("update `attribute_group_mappings` set `position` = 10 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (235)");
        DB::statement("update `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (236)");
        DB::statement("update `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (356)");
        DB::statement("update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (357)");
        DB::statement("update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (239)");
        DB::statement("update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (240)");
        DB::statement("update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (241)");
        DB::statement("update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (52)");
        DB::statement("update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 101 and `attribute_id` in (53)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (330)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (55)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (349)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (127)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (385)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 102 and `attribute_id` in (386)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 103 and `attribute_id` in (339)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (103, 340, 2)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (103, 79, 3)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 104 and `attribute_id` in (341)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 104 and `attribute_id` in (431)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (138)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (342)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (84)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (432)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 105 and `attribute_id` in (433)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (343)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (87)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (344)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 106 and `attribute_id` in (345)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (445)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (346)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (451)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (347)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 107 and `attribute_id` in (450)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 108 and `attribute_id` in (446)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 108 and `attribute_id` in (152)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 108 and `attribute_id` in (348)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (11)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (13)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (14)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 53 and `attribute_id` in (15)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 54 and `attribute_id` in (22)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 55 and `attribute_id` in (7)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 55 and `attribute_id` in (8)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 56 and `attribute_id` in (28)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
