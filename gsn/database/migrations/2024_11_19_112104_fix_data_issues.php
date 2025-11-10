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
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Gestion de la paie' WHERE `attributes`.`id` = 320; ");
        DB::statement(query: "UPDATE `category_translations` SET `name` = 'Gestion interne & Commerciale' WHERE `category_translations`.`id` = 11; ");
        DB::statement(query:"UPDATE `category_translations` SET `name` = 'Gestion interne & Commerciale' WHERE `category_translations`.`id` = 12; ");
        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Solution logicielle' WHERE `attributes`.`id` = 379; ");
        DB::statement(query:"UPDATE `attributes` SET `admin_name` = 'Solution logicielle ? Si non, précisez le type de solution ?' WHERE `attributes`.`id` = 155; ");
        DB::statement(query:"UPDATE `attribute_groups` SET `name` = 'Accessibilité' WHERE `attribute_groups`.`id` = 128; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
