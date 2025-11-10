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
        DB::statement(query: "UPDATE `category_translations` SET `description` = '<p>Autres solutions numériques</p>' WHERE `category_translations`.`id` = 25; ");
        DB::statement(query: "UPDATE `category_translations` SET `description` = '<p>Autres solutions numériques</p>' WHERE `category_translations`.`id` = 26; ");
        DB::statement(query: "DELETE FROM `category_filterable_attributes` WHERE `category_id` = 13;");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (52, 10)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (324, 9)");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (430, 9)");

        DB::statement(query: "UPDATE `attribute_translations` set `name` = 'Immatriculé sous réserve par la DGFiP' where `id` = 533  ");
        DB::statement(query: "UPDATE `attribute_translations` set `name` = 'Immatriculé sous réserve par la DGFiP' where `id` = 534");
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (52, 11)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
