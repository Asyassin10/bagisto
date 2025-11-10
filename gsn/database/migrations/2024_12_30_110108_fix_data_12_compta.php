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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Interopérable avec des PDP , Si oui lesquelles ?' WHERE `attributes`.`id` = 64; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Interopérable avec des PDP , Si oui lesquelles ?' WHERE `attribute_translations`.`id` = 127; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Interopérable avec des PDP , Si oui lesquelles ?' WHERE `attribute_translations`.`id` = 128; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Interopérable avec un système de conservation ou d’archivage , Si oui lesquelles ?' WHERE `attributes`.`id` = 70; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Interopérable avec un système de conservation ou d’archivage , si Oui, lesquelles ?' WHERE `attribute_translations`.`id` = 139; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Interopérable avec un système de conservation ou d’archivage , si Oui, lesquelles ?' WHERE `attribute_translations`.`id` = 140; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
