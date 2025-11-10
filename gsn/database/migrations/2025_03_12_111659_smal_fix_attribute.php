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
        DB::statement("UPDATE `attributes` SET `max_length` = NULL WHERE `attributes`.`id` = 473; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = '1' WHERE `attributes`.`id` = 242; ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
