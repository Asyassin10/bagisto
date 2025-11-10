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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Actif' WHERE `attributes`.`id` = 8; ");
        DB::statement("UPDATE `attribute_groups` SET `name` = 'Statut de la fiche produit' WHERE `attribute_groups`.`id` = 62; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
