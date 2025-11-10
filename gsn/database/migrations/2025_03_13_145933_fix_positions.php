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
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 57 and `attribute_id` in (1)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 57 and `attribute_id` in (2)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 57 and `attribute_id` in (455)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 57 and `attribute_id` in (3)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 58 and `attribute_id` in (9)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 59 and `attribute_id` in (16)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 59 and `attribute_id` in (17)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (460)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (461)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (462)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (165, 463, 4)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (242)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (426)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (427)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (245)");
        DB::statement("update `attribute_group_mappings` set `position` = 9 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (246)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (165, 481, 10)");
        DB::statement("update `attribute_group_mappings` set `position` = 11 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (247)");
        DB::statement("update `attribute_group_mappings` set `position` = 12 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (464)");
        DB::statement("update `attribute_group_mappings` set `position` = 13 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (465)");
        DB::statement("update `attribute_group_mappings` set `position` = 14 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (248)");
        DB::statement("update `attribute_group_mappings` set `position` = 15 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (249)");
        DB::statement("update `attribute_group_mappings` set `position` = 16 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (251)");
        DB::statement("update `attribute_group_mappings` set `position` = 17 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (41)");
        DB::statement("update `attribute_group_mappings` set `position` = 18 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (466)");
        DB::statement("update `attribute_group_mappings` set `position` = 19 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (467)");
        DB::statement("update `attribute_group_mappings` set `position` = 20 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (468)");
        DB::statement("update `attribute_group_mappings` set `position` = 21 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (428)");
        DB::statement("update `attribute_group_mappings` set `position` = 22 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (254)");
        DB::statement("update `attribute_group_mappings` set `position` = 23 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (454)");
        DB::statement("update `attribute_group_mappings` set `position` = 24 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (469)");
        DB::statement("update `attribute_group_mappings` set `position` = 25 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (470)");
        DB::statement("update `attribute_group_mappings` set `position` = 26 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (471)");
        DB::statement("update `attribute_group_mappings` set `position` = 27 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (256)");
        DB::statement("update `attribute_group_mappings` set `position` = 28 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (430)");
        DB::statement("update `attribute_group_mappings` set `position` = 29 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (258)");
        DB::statement("update `attribute_group_mappings` set `position` = 30 where `attribute_group_mappings`.`attribute_group_id` = 165 and `attribute_id` in (472)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (473)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (480)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (264)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (330)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (55)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (474)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (429)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 166 and `attribute_id` in (266)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 167 and `attribute_id` in (475)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 167 and `attribute_id` in (267)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 168 and `attribute_id` in (341)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 168 and `attribute_id` in (431)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 169 and `attribute_id` in (342)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 169 and `attribute_id` in (453)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 169 and `attribute_id` in (412)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 169 and `attribute_id` in (432)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 170 and `attribute_id` in (343)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 170 and `attribute_id` in (87)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 170 and `attribute_id` in (344)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 170 and `attribute_id` in (476)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 170 and `attribute_id` in (477)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (171, 483, 1)");
        DB::statement("insert into `attribute_group_mappings` (`attribute_group_id`, `attribute_id`, `position`) values (171, 482, 2)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 171 and `attribute_id` in (346)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 171 and `attribute_id` in (451)");
        DB::statement("update `attribute_group_mappings` set `position` = 5 where `attribute_group_mappings`.`attribute_group_id` = 171 and `attribute_id` in (478)");
        DB::statement("update `attribute_group_mappings` set `position` = 6 where `attribute_group_mappings`.`attribute_group_id` = 171 and `attribute_id` in (479)");
        DB::statement("update `attribute_group_mappings` set `position` = 7 where `attribute_group_mappings`.`attribute_group_id` = 171 and `attribute_id` in (347)");
        DB::statement("update `attribute_group_mappings` set `position` = 8 where `attribute_group_mappings`.`attribute_group_id` = 171 and `attribute_id` in (450)");
        DB::statement("delete from `attribute_group_mappings` where `attribute_group_mappings`.`attribute_group_id` = 171 and `attribute_group_mappings`.`attribute_id` in (445)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 172 and `attribute_id` in (446)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 172 and `attribute_id` in (152)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 60 and `attribute_id` in (11)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 60 and `attribute_id` in (13)");
        DB::statement("update `attribute_group_mappings` set `position` = 3 where `attribute_group_mappings`.`attribute_group_id` = 60 and `attribute_id` in (14)");
        DB::statement("update `attribute_group_mappings` set `position` = 4 where `attribute_group_mappings`.`attribute_group_id` = 60 and `attribute_id` in (15)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 61 and `attribute_id` in (22)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 62 and `attribute_id` in (7)");
        DB::statement("update `attribute_group_mappings` set `position` = 2 where `attribute_group_mappings`.`attribute_group_id` = 62 and `attribute_id` in (8)");
        DB::statement("update `attribute_group_mappings` set `position` = 1 where `attribute_group_mappings`.`attribute_group_id` = 63 and `attribute_id` in (28)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
