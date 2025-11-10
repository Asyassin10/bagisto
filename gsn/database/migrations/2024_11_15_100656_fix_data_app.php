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
        DB::statement(query: "UPDATE `category_translations` SET `description` = '<p>Comptabilité - Précomptabilité</p>' WHERE `category_translations`.`id` = 5; ");
        DB::statement(query: "UPDATE `category_translations` SET `description` = '<p>Comptabilité - Précomptabilité</p>' WHERE `category_translations`.`id` = 6; ");
        DB::statement(query: "DELETE FROM `category_filterable_attributes` WHERE `attribute_id` = 383 AND `category_id` = 3;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
