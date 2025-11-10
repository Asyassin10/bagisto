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
        DB::statement("update `attribute_translations` set `name` = 'Benchmark' where `id` = 773;");
        DB::statement("update `attribute_translations` set `name` = 'Benchmark' where `id` = 774;");
        DB::statement("update `attributes` set `admin_name` = 'Benchmark'  where `id` = 387;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
