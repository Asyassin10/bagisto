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
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Plan de récupération en cas de cyberattaque, si oui décrire.' WHERE `attributes`.`id` = 453; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Plan de récupération en cas de cyberattaque, si oui décrire.' WHERE `attribute_translations`.`id` = 905; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Plan de récupération en cas de cyberattaque, si oui décrire.' WHERE `attribute_translations`.`id` = 906; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
