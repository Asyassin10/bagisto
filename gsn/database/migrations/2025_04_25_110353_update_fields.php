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
        DB::statement("UPDATE `attribute_options` SET `admin_name` = 'Aucun' WHERE `attribute_options`.`id` = 487; ");
        DB::statement("UPDATE `attribute_option_translations` SET `label` = 'Aucun' WHERE `attribute_option_translations`.`id` = 974; ");
        DB::statement("UPDATE `attribute_option_translations` SET `label` = 'Aucun' WHERE `attribute_option_translations`.`id` = 973; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
