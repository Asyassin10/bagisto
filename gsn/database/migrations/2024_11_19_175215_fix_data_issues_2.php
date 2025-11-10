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
        DB::statement(query: "UPDATE `category_translations` SET `description` = '<p>&nbsp;Gestion interne & Commerciale</p>' WHERE `category_translations`.`id` = 11; ");
        DB::statement(query:"UPDATE `category_translations` SET `description` = '<p>&nbsp;Gestion interne & Commerciale</p>' WHERE `category_translations`.`id` = 12; ");
        DB::statement(query:"UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 267; ");



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
