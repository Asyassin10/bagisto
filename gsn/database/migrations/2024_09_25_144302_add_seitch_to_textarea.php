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
        Schema::table('textarea', function (Blueprint $table) {
            //
            DB::statement(query: "UPDATE attributes SET type = 'textarea' WHERE code = 'c__c0c2c0';");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('textarea', function (Blueprint $table) {
            //
        });
    }
};
