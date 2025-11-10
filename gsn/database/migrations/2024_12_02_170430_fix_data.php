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
        DB::statement(query: "update `attribute_translations` set `name` = 'Gestion de la paie' where `id` = 639 ");
        DB::statement(query: "update `attribute_translations` set `name` = 'Gestion de la paie' where `id` = 640");
        DB::statement(query: "update `attribute_translations` set `name` = 'Certification PEPPOL' where `id` = 527");
        DB::statement(query: "update `attribute_translations` set `name` = 'Certification PEPPOL' where `id` = 528");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel comptable, Si oui, lesquels ' WHERE `attributes`.`id` = 300; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel de gestion / de caisse, si oui lesquels ' WHERE `attributes`.`id` = 302; ");
        DB::statement(query: "update `attributes` set `admin_name` = 'Relance automatique des tâches' where `id` = 180  ");
        DB::statement(query: "update `attribute_translations` set `name` = 'Relance automatique des tâches' where `id` = 359");
        DB::statement(query: "update `attribute_translations` set `name` = 'Relance automatique des tâches' where `id` = 360");
        DB::statement(query: "update `attribute_translations` set `name` = 'Interopérable avec un logiciel de comptabilité' where `id` = 407");
        DB::statement(query: "update `attribute_translations` set `name` = 'Interopérable avec un logiciel de comptabilité' where `id` = 408");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
