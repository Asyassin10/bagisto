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
        // UPDATE `attributes` SET `type` = 'text' WHERE `attributes`.`id` = 3;
        DB::statement("UPDATE attributes SET type = 'select' WHERE code = 'PU0DFOK7IYQDdrxv';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
