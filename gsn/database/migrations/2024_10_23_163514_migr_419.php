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

        DB::statement("UPDATE `roles` SET `permissions` = JSON_ARRAY('dashboard', 'catalog', 'catalog.products', 'catalog.products.create', 'catalog.products.edit'), `updated_at` = '2024-10-23 16:37:30' WHERE `id` = 2;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
