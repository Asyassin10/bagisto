<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("UPDATE category_translations SET name = 'Social - RH' WHERE category_translations.id = 7;");
        DB::statement("UPDATE attribute_families SET name = 'Social - RH' WHERE attribute_families.id = 3;");
        DB::statement("UPDATE category_translations SET name = 'Social - RH' WHERE category_translations.id = 8;");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
