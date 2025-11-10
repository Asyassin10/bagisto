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
        Schema::table('admins', function (Blueprint $table) {
            $table->unsignedInteger('parent_id')->nullable(); // Add the parent_id column

            // Add the foreign key constraint referencing the same table
            $table->foreign('parent_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            //
            // Drop the foreign key constraint first
            $table->dropForeign(['parent_id']);

            // Then drop the column
            $table->dropColumn('parent_id');
        });
    }
};
