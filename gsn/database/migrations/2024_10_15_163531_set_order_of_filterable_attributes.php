<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        $path = database_path('migrations/fix_attributes.sql');
        if (File::exists($path)) {
            $sql = File::get($path);
            DB::unprepared(query: $sql);
        }

        /*     DB::statement("UPDATE `attributes` SET `position_filter` = id WHERE id between 0 and 100000;");
        DB::statement("UPDATE `attributes` SET `position_filter` = '1' WHERE `attributes`.`id` = 444;");
        DB::statement("UPDATE `attributes` SET `position_filter` = '385' WHERE `attributes`.`id` = 39;");
        DB::statement("UPDATE `attributes` SET `position_filter` = '39' WHERE `attributes`.`id` = 385;");
        DB::statement("UPDATE `attributes` SET `position_filter` = '300' WHERE `attributes`.`id` = 385;");
        DB::statement("UPDATE `attributes` SET `position_filter` = '103' WHERE `attributes`.`id` = 104;");
        DB::statement("UPDATE `attributes` SET `position_filter` = '104' WHERE `attributes`.`id` = 40;"); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
