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
    DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `attribute_id` = 32 ");
    DB::statement(query:"DELETE  FROM `category_filterable_attributes` WHERE `category_id` = 3 ");
    // INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '267');
    // compta precompta
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '444');");
    // Module de facturation compatible facturation électronique
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '37');");
    // Gestion de l'IR
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '39');");
    // Gestion des notes de frais
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '40');");
    // Prévisionnels de budget
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '46');");
    // Utilise un RPA (robotic Process Automation)
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '51');");
    // Intègre une solution IA
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '52');");
    // Import de données
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '349');");
    // Export de données personnalisable
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '385');");
    // Intégration bureautique type Excel ou Power BI
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '60');");
    // Hébergement des données en UE
    DB::statement(query:"INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES ('3', '82');");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
