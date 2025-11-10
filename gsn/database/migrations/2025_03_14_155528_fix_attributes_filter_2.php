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
        DB::statement("delete from `category_filterable_attributes` where `category_id` = 9 ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '242'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '245'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '246'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '247'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '251'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '468'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '470'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '256'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '430'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '264'); ");
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('9', '267'); ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
