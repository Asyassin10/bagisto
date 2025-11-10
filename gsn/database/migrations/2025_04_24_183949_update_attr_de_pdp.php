<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

	DB::statement("UPDATE attributes SET max_length = '100' WHERE attributes.id = 480; ");

 
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
