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
        DB::statement("UPDATE `category_translations` SET `slug` = 'PDP' WHERE `category_translations`.`id` = 17; ");
        DB::statement("UPDATE `category_translations` SET `name` = 'Gestion de trésorerie - Financement' WHERE `category_translations`.`id` = 21; ");
        DB::statement("UPDATE `category_translations` SET `name` = 'Gestion de trésorerie - Financement' WHERE `category_translations`.`id` = 22; ");
        DB::statement("UPDATE `category_translations` SET `name` = 'Signature électronique - Télétransmission - Archivage' WHERE `category_translations`.`id` = 24; ");
        DB::statement("UPDATE `category_translations` SET `name` = 'Signature électronique - Télétransmission - Archivage' WHERE `category_translations`.`id` = 23; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
