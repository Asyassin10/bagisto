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
        DB::statement("UPDATE `product_flat` SET `visible_individually` = '1' WHERE `product_flat`.`id` BETWEEN 0 and 10000000;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
