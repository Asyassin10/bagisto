<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

	DB::statement("UPDATE `attribute_options` SET `admin_name` = 'Banque traditionnelle et Néobanque' WHERE `attribute_options`.`id` = 486; ");

	DB::statement("UPDATE `attribute_option_translations` SET `label` = 'Banque traditionnelle et Néobanque' WHERE `attribute_option_translations`.`id` = 972; ");

	DB::statement("UPDATE `attribute_option_translations` SET `label` = 'Banque traditionnelle et Néobanque' WHERE `attribute_option_translations`.`id` = 971; ");
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
