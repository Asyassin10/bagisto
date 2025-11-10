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
        DB::statement("UPDATE `category_filterable_attributes` SET `attribute_id` = '468' WHERE `category_filterable_attributes`.`id` = 71; ");
        DB::statement("UPDATE `category_filterable_attributes` SET `attribute_id` = '470' WHERE `category_filterable_attributes`.`id` = 72; ");
        DB::statement("UPDATE `category_filterable_attributes` SET `attribute_id` = '256' WHERE `category_filterable_attributes`.`id` = 73; ");
        DB::statement("UPDATE `category_filterable_attributes` SET `attribute_id` = '430' WHERE `category_filterable_attributes`.`id` = 74; ");
        DB::statement("UPDATE `category_filterable_attributes` SET `attribute_id` = '264' WHERE `category_filterable_attributes`.`id` = 75; ");
        DB::statement("UPDATE `category_filterable_attributes` SET `attribute_id` = '267' WHERE `category_filterable_attributes`.`id` = 105; ");
        DB::statement("DELETE FROM `category_filterable_attributes` where `category_filterable_attributes`.`id` = 106");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
