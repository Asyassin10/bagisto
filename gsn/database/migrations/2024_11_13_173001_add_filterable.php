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
        DB::statement(query: "INSERT INTO `category_filterable_attributes` (`attribute_id`, `category_id`) values (320, 4)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
