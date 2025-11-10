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

        DB::statement("UPDATE `attributes` SET `admin_name` = 'Descriptif de la garantie de confidentialité des données' WHERE `attributes`.`id` = 484; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Descriptif de la garantie de confidentialité des données' WHERE `attribute_translations`.`attribute_id` = 484; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Descriptif de la garantie de confidentialité des données' WHERE `attribute_translations`.`attribute_id` = 484; ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
