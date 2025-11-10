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
        DB::statement("UPDATE `attributes` SET `is_required` = '1' WHERE `attributes`.`id` = 480; ");
        DB::statement("UPDATE `attributes` SET `max_length` = '50' WHERE `attributes`.`id` = 480; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Le support est-t-il situé en France ?' WHERE `attributes`.`id` = 476; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Le support est-t-il situé en France ?' WHERE `attribute_translations`.`id` = 951; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Le support est-t-il situé en France ?' WHERE `attribute_translations`.`id` = 952; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
