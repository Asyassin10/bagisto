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
        DB::statement("update `attribute_translations` set `name` = 'Prévisionnels CA' where `id` = 652;");
        DB::statement("update `attribute_translations` set `name` = 'Prévisionnels CA' where `id` = 651;");
        DB::statement("update `attributes` set `admin_name` = 'Prévisionnels CA' where `id` = 326  ;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
