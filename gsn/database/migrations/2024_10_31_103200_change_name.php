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
        DB::statement("UPDATE `attribute_families` SET `name` = 'Autres solutions numériques' WHERE `attribute_families`.`name` = 'Autre';");
        DB::statement("UPDATE `category_translations` SET `name` = 'Autres solutions numériques' WHERE `category_translations`.`name` = 'Autre';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
