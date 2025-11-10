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
        DB::statement(query: "UPDATE `attribute_families` set `name` = 'Comptabilité - Précomptabilité' where `id` = 2;");
        DB::statement(query: "UPDATE `category_translations` set `name` = 'Comptabilité - Précomptabilité', `slug` = 'comptabilite-precomptabilite' where `id` = 5  ");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (241, 8)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (52, 8)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (52, 3)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (383, 3)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (349, 3)");
        DB::statement(query: "DELETE FROM `category_filterable_attributes` WHERE `attribute_id` = 306");
        DB::statement(query: "DELETE FROM `category_filterable_attributes` WHERE `attribute_id` = 307");
        DB::statement(query: "UPDATE `attribute_translations` SET `name` = 'eIDAS' WHERE `attribute_translations`.`id` = 629; ");
        DB::statement(query: "UPDATE `attribute_translations` SET `name` = 'eIDAS' WHERE `attribute_translations`.`id` = 630; ");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (52, 12)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (241, 6)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (52, 5)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (330, 5)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
