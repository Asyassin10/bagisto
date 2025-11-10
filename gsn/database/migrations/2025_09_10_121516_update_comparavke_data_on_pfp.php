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
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`id` = 460;");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`id` = 461;");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`id` = 462;");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`id` = 464;");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = '39YF8eqIWnvKLedA';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'VnRABLzky2gwsbvc';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'niF8AJfF2bbyydif';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'eQksztIvMarY9XSq';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'yWc1TPZo34X0btrE';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'im4Js9IU9e9Q4tDn';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'Kiug1YOiziKltz0J';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'LG5gAmC3mI0Ywbmn';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'fJx0VwKa6ig8B5m3';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'prvt2Qgq6EYZU6YC';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'kaHcHDhZl2NkwyEe';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'RpxnoCVIBBsXZfh4';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'a3jX7BrdyaBN2hDV';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'BuDiG3wXmdmzHxvp';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'fkmJc6DAudSvs5fj';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'wEs1gD9yCNHw2EtQ';");
        DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = 'w2qfK4o8FvoWuToO';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
