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
        DB::statement("update `attribute_translations` set `name` = 'Interopérable avec un logiciel comptable' where `id` = 597 ");
        DB::statement("update `attribute_translations` set `name` = 'Interopérable avec un logiciel comptable' where `id` = 598");
        DB::statement("update `attribute_translations` set `name` = 'Interopérable avec un logiciel de gestion / caisse' where `id` = 601");
        DB::statement("update `attribute_translations` set `name` = 'Interopérable avec un logiciel de gestion / caisse' where `id` = 602");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
