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

        //   DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('97', '6');");

        $productExists01 = DB::table('products')->where('id', 97)->exists();
        if ($productExists01) {
            if (!DB::table('product_categories')
                ->where('product_id', 97)
                ->where('category_id', 6)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 97, 'category_id' => 6]
                );
            }
        }


        //  DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('95', '3');");

        $productExists02 = DB::table('products')->where('id', 95)->exists();
        if ($productExists02) {
            /*    DB::table('product_categories')->insert(
                ['product_id' => 95, 'category_id' => 3]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id', 95)
                ->where('category_id', 3)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 95, 'category_id' => 3]
                );
            }
        }


        //        DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('93', '6');");



        $productExists003 = DB::table('products')->where('id', operator: 93)->exists();
        if ($productExists003) {
            /* DB::table('product_categories')->insert(
                ['product_id' => 93, 'category_id' => 6]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id', 93)
                ->where('category_id', 6)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 93, 'category_id' => 6]
                );
            }
        }


        //   DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('91', '3');");




        $productExists004 = DB::table('products')->where('id', operator: 91)->exists();
        if ($productExists004) {
            /* DB::table('product_categories')->insert(
                ['product_id' => 91, 'category_id' => 3]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id', 91)
                ->where('category_id', 3)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 91, 'category_id' => 3]
                );
            }
        }

        // DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('84', '6');");

        $productExists004 = DB::table('products')->where('id', operator: 84)->exists();
        if ($productExists004) {
            /*   DB::table('product_categories')->insert(
                ['product_id' => 84, 'category_id' => 6]
            ); */

            if (!DB::table('product_categories')
                ->where('product_id', 84)
                ->where('category_id', 6)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 84, 'category_id' => 6]
                );
            }
        }


        // DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('83', '3');");

        $productExists005 = DB::table('products')->where('id', operator: 83)->exists();
        if ($productExists005) {
            /*   DB::table('product_categories')->insert(
                ['product_id' => 83, 'category_id' => 3]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id', 83)
                ->where('category_id', 3)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 83, 'category_id' => 3]
                );
            }
        }

        //    DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('81', '3');");

        $productExists006 = DB::table('products')->where('id', operator: 81)->exists();
        if ($productExists006) {
            /*  DB::table('product_categories')->insert(
                ['product_id' => 81, 'category_id' => 3]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id', 81)
                ->where('category_id', 3)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 81, 'category_id' => 3]
                );
            }
        }

        //   DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('77', '3');");

        $productExists007 = DB::table('products')->where('id', operator: 77)->exists();
        if ($productExists007) {
            /*  DB::table('product_categories')->insert(
                ['product_id' => 77, 'category_id' => 3]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id', 77)
                ->where('category_id', 3)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 77, 'category_id' => 3]
                );
            }
        }
        //DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('73', '3');");


        $productExists0055 = DB::table('products')->where('id', operator: 73)->exists();
        if ($productExists0055) {
            /*   DB::table('product_categories')->insert(
                ['product_id' => 73, 'category_id' => 3]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id',  73)
                ->where('category_id', 3)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 73, 'category_id' => 3]
                );
            }
        }
        //   DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('68', '6');");
        $productExists009 = DB::table('products')->where('id', operator: 68)->exists();
        if ($productExists009) {
            if (!DB::table('product_categories')
                ->where('product_id',  68)
                ->where('category_id', 6)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 68, 'category_id' => 6]
                );
            }
        }

        //  DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('66', '3');");

        $productExists0010 = DB::table('products')->where('id', operator: 66)->exists();
        if ($productExists0010) {
            /*       DB::table('product_categories')->insert(
                ['product_id' => 66, 'category_id' => 3]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id',  66)
                ->where('category_id', 3)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 66, 'category_id' => 3]
                );
            }
        }

        // DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('64', '6');");
        $productExists001144 = DB::table('products')->where('id', operator: 64)->exists();
        if ($productExists001144) {
            /*  DB::table('product_categories')->insert(
                ['product_id' => 64, 'category_id' => 6]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id',  64)
                ->where('category_id', 6)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 64, 'category_id' => 6]
                );
            }
        }

        // DB::statement("INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES ('61', '6');");
        $productExists0011 = DB::table('products')->where('id', operator: 61)->exists();
        if ($productExists0011) {
            /*  DB::table('product_categories')->insert(
                ['product_id' => 61, 'category_id' => 6]
            ); */
            if (!DB::table('product_categories')
                ->where('product_id',  61)
                ->where('category_id', 6)
                ->exists()) {
                DB::table('product_categories')->insert(
                    ['product_id' => 61, 'category_id' => 6]
                );
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
