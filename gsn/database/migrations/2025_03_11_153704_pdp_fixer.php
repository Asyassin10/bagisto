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
        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Avec combien de PDP la vôtre s\'interface-t-elle , si oui Lesquelles ?','text', '', '', '', 'nQySJMv5RGvyAGed', 0, '2025-03-11 15:35:05', '2025-03-11 15:35:05')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 480, 'Avec combien de PDP la vôtre s\'interface-t-elle , si oui Lesquelles ?')");

        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 480, 'Avec combien de PDP la vôtre s\'interface-t-elle , si oui Lesquelles ?')");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Avec combien de PDP la vôtre s\'interface-t-elle ?' WHERE `attributes`.`id` = 473; ");
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Hotline incluse ?' WHERE `attributes`.`id` = 478; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
