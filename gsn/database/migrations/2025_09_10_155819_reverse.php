<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

    DB::statement("UPDATE `attributes` SET `is_comparable` = '1' WHERE `attributes`.`code` = '3BlnHKhXvk4OMhmc';");


        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
