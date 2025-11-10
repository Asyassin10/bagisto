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
        DB::statement("DELETE FROM `category_filterable_attributes` WHERE  `category_filterable_attributes`.`category_id` between 0 and 999999;");

        DB::statement("INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES(3, 32),(4, 101),(4, 104),(4, 106),(4, 107),(4, 108),(4, 111),(4, 120),(4, 138),(4, 40),(5, 138),(5, 159),(5, 160),(5, 161),(5, 163),(5, 166),(5, 169),(5, 170),(5, 172),(6, 138),(6, 175),(6, 178),(6, 180),(6, 181),(6, 182),(6, 184),(6, 195),(6, 198),(6, 204),(7, 138),(7, 207),(7, 208),(7, 209),(7, 210),(7, 211),(7, 212),(7, 213),(7, 214),(7, 215),(8, 138),(8, 225),(8, 226),(8, 229),(8, 232),(8, 233),(8, 235),(8, 236),(8, 239),(9, 242),(9, 245),(9, 246),(9, 247),(9, 251),(9, 256),(9, 259),(9, 264),(9, 267),(10, 138),(10, 268),(10, 269),(10, 270),(10, 274),(10, 276),(11, 138),(11, 278),(11, 279),(11, 282),(11, 284),(11, 285),(11, 292),(11, 294),(11, 299),(11, 301),(12, 138),(12, 303),(12, 304),(12, 305),(12, 306),(12, 307),(12, 311),(12, 312),(12, 313),(12, 315),(13, 379),(13, 330),(13, 339),(13, 341),(3, 444),(3, 37),(3, 39),(3, 40),(3, 41),(3, 46),(3, 51),(3, 60),(3, 82),(3, 385);");
        DB::statement("DELETE FROM `category_filterable_attributes` WHERE `attribute_id` = 169;");
        DB::statement("DELETE FROM `category_filterable_attributes` WHERE `attribute_id` = 170;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
