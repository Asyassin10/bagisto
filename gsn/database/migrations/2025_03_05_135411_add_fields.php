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
        DB::statement("update `attributes` set `admin_name` = 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing', `swatch_type` = 'dropdown', `is_filterable` = '', `is_configurable` = '', `is_visible_on_front` = '', `default_value` = '', `attributes`.`updated_at` = '2025-03-06 12:44:23' where `id` = 246");
        DB::statement(" update `attribute_translations` set `name` = 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing' where `id` = 491");
        DB::statement("update `attribute_translations` set `name` = 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing' where `id` = 492");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
