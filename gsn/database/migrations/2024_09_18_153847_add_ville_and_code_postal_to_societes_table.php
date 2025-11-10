<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVilleAndCodePostalToSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('societes', function (Blueprint $table) {
            $table->string('ville')->nullable()->after('adresse'); // Adjust the 'after' column if needed
            $table->string('code_postal')->nullable()->after('ville');
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
            $table->dropColumn('ville');
            $table->dropColumn('code_postal');
        });
    }
}

