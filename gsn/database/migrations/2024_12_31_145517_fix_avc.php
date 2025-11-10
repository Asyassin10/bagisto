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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Nombre de PDP interfacées avec la PDP' WHERE `attributes`.`id` = 262; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Nombre de PDP interfacées avec la PDP ?' WHERE `attribute_translations`.`id` = 524; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Nombre de PDP interfacées avec la PDP ?' WHERE `attribute_translations`.`id` = 523; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Nombre de PDP interfacées avec la PDP , avec lesquelles ?' WHERE `attributes`.`id` = 459; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Nombre de PDP interfacées avec la PDP , avec lesquelles ?' WHERE `attribute_translations`.`id` = 917; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Nombre de PDP interfacées avec la PDP , avec lesquelles ?' WHERE `attribute_translations`.`id` = 918; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
