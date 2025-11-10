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

        DB::statement("UPDATE `attributes` SET `admin_name` = 'Intègre une solution IA , Si oui, laquelle ?' WHERE `attributes`.`id` = 53; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Intègre une solution IA , Si oui, laquelle ?' WHERE `attribute_translations`.`id` = 105; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Intègre une solution IA , Si oui, laquelle ?' WHERE `attribute_translations`.`id` = 106; ");
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
