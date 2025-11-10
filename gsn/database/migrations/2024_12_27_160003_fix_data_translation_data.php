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
        DB::statement("update `attribute_translations` set `name` = 'Importation et exploitation d\\'Open data' where `id` = 317 ");
        DB::statement("update `attribute_translations` set `name` = 'Importation et exploitation d\\'Open data' where `id` = 318");
        DB::statement(query: "DELETE FROM `category_filterable_attributes`  WHERE `category_id` = 5 AND `attribute_id` = 330;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
