<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminIdToSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('societes', function (Blueprint $table) {
            // Check if the column already exists
            if (!Schema::hasColumn('societes', 'admin_id')) {
                $table->unsignedBigInteger('admin_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('societes', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
    }
}
