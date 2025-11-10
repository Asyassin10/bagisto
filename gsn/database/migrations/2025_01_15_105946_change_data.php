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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Point d’accès PEPPOL' WHERE `attributes`.`id` = 264; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Point d’accès PEPPOL' WHERE `attribute_translations`.`id` = 527; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Point d’accès PEPPOL' WHERE `attribute_translations`.`id` = 528; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
