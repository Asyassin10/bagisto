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
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 247; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '0' WHERE `attributes`.`id` = 41; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 468; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 470; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 256; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 430; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 264; ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
