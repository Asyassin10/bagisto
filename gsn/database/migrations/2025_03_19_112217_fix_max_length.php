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
        DB::statement("UPDATE `attributes` SET `max_length` = '36' WHERE `attributes`.`id` = 254; ");
        DB::statement("UPDATE `attributes` SET `max_length` = '100' WHERE `attributes`.`id` = 480; ");
        DB::statement("UPDATE `attributes` SET `max_length` = '100' WHERE `attributes`.`id` = 475; ");
        DB::statement("UPDATE `attributes` SET `max_length` = '100' WHERE `attributes`.`id` = 484; ");
        DB::statement("UPDATE `attributes` SET `max_length` = '500' WHERE `attributes`.`id` = 446; ");
        DB::statement("UPDATE `attributes` SET `max_length` = '300' WHERE `attributes`.`id` = 485; ");
        DB::statement("UPDATE `attributes` SET `max_length` = '50' WHERE `attributes`.`id` = 479; ");
        DB::statement("UPDATE `attributes` SET `validation` = NULL WHERE `attributes`.`id` = 479; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
