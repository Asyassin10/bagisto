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
        DB::statement("UPDATE `attributes` SET `is_comparable` = 0 WHERE type NOT IN ('checkbox', 'select');");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
