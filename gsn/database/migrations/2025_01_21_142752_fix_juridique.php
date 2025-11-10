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
        DB::statement("UPDATE `category_translations` SET `name` = 'Juridique - Fiscal' WHERE `category_translations`.`id` = 15; ");
        DB::statement("UPDATE `category_translations` SET `name` = 'Juridique - Fiscal' WHERE `category_translations`.`id` = 16; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
