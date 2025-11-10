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
        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`, `id`) VALUES ('9', '468', NULL), ('9', '470', NULL); ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
