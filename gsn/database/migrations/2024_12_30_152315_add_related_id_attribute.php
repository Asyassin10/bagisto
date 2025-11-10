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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Sur les 36 cas d\'usage, combien en gère la PDP, et si oui, pouvez-vous indiquer les N° de cas d\\'usage ?' WHERE `attributes`.`id` = 454; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage, combien en gère la PDP, et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attribute_translations`.`id` = 907; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage, combien en gère la PDP, et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attribute_translations`.`id` = 908; ");
        Schema::table('attributes', function (Blueprint $table) {
            //
            $table->unsignedInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('attributes');
        });
        DB::statement("UPDATE `attributes` SET `parent_id` = '254' WHERE `attributes`.`id` = 454;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attributes', function (Blueprint $table) {
            //
        });
    }
};
