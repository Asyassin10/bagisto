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
        DB::statement("UPDATE `attributes` SET `is_filterable` = 1 WHERE `attributes`.`id` = 242; ");



        DB::statement("UPDATE `attributes` SET `admin_name` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...), Si oui, lesquels ?' WHERE `attributes`.`id` = 481; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...), Si oui, lesquels ?' WHERE `attribute_translations`.`attribute_id` = 481; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...), Si oui, lesquels ?' WHERE `attribute_translations`.`attribute_id` = 481; ");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
