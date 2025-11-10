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
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel comptable, Si oui, lesquels ?' WHERE `attributes`.`id` = 300; ");
        DB::statement(query: "UPDATE `attributes` SET `admin_name` = 'Interopérable avec un logiciel de gestion / de caisse, si oui lesquels ?' WHERE `attributes`.`id` = 302; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
