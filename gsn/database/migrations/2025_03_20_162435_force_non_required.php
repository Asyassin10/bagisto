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
        //    DB::statement("UPDATE attributes SET is_required = '0' WHERE attributes.`id`BETWEEN 0 and 100000;");
        //
        DB::statement("UPDATE `attributes` SET `max_length` = '50' WHERE `attributes`.`id` = 481; ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
