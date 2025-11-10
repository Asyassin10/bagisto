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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Préciser si la facturation est à l\'émission et/ou à la réception de facture, les conditions de la gratuité, autre…' WHERE `attributes`.`id` = 482; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Préciser si la facturation est à l\'émission et/ou à la réception de facture, les conditions de la gratuité, autre…' WHERE `attribute_translations`.`id` = 963; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Préciser si la facturation est à l\'émission et/ou à la réception de facture, les conditions de la gratuité, autre…' WHERE `attribute_translations`.`id` = 964; ");
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
