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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Quelles sont les PDP qui s\'interfacent avec la vôtre ?' WHERE `attributes`.`id` = 480; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Quelles sont les PDP qui s\'interfacent avec la vôtre ?' WHERE `attribute_translations`.`id` = 960; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Quelles sont les PDP qui s\'interfacent avec la vôtre ?' WHERE `attribute_translations`.`id` = 959; ");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
