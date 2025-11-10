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
        DB::statement("DELETE  FROM category_filterable_attributes WHERE attribute_id = 52");

        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('13', '379');");
        //  DB::statement("DELETE  FROM category_filterable_attributes WHERE attribute_id = 349");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('13', '330');");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('13', '339');");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('13', '341');");
        //DB::statement("UPDATE `attributes` SET `admin_name` = 'Saisie des évènements par les clients' WHERE `attributes`.`id` = 368;");
        DB::statement("DELETE FROM `category_filterable_attributes` WHERE `attribute_id` = 257;");
        DB::statement("UPDATE `attributes` SET `type` = 'select' WHERE `attributes`.`id` = 430;");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 349;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
