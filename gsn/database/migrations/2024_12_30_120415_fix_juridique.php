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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Génération des écritures comptables de Paie , Si oui, quels formats ?' WHERE `attributes`.`id` = 131; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Génération des écritures comptables de Paie , Si oui, quels formats ?' WHERE `attribute_translations`.`id` = 261; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Génération des écritures comptables de Paie , Si oui, quels formats ?' WHERE `attribute_translations`.`id` = 262; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Gestion des contrats , Si oui type de contrats ?' WHERE `attributes`.`id` = 240; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Gestion des contrats , Si oui type de contrats ?' WHERE `attribute_translations`.`id` = 479; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Gestion des contrats , Si oui type de contrats ?' WHERE `attribute_translations`.`id` = 480; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
