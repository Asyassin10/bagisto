<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 460; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 461; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 464; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 465; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 466; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 467; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 468; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 256; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 469; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 330; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 472; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 470; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 474; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 471; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 476; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 264; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 473; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 477; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 482; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 483; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 478; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 461; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 478; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 477; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 464; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 476; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 471; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 465; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 466; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 474; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 467; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 472; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 41; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 469; ");
        DB::statement("UPDATE `attributes` SET `max_length` = 50 WHERE `attributes`.`id` = 473; ");
        DB::statement("UPDATE `attributes` SET `validation` = NULL WHERE `attributes`.`id` = 473; ");
        DB::statement("UPDATE `attributes` SET `is_required` = 1 WHERE `attributes`.`id` = 462; ");
        DB::statement("UPDATE `attributes` SET `type` = 'checkbox' WHERE `attributes`.`id` = 462; ");
        //  
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Permet l\'émission et la réception de factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis).' WHERE `attributes`.`id` = 245; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Permet l\'émission et la réception de factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis).' WHERE `attribute_translations`.`attribute_id` = 245; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Permet l\'émission et la réception de factures hors périmètre du e-invoicing (B2B international, B2C, non assujettis).' WHERE `attribute_translations`.`attribute_id` = 245; ");


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...)' WHERE `attributes`.`id` = 246; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...)' WHERE `attribute_translations`.`attribute_id` = 246; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Permet l\'emission et la réception de factures électroniques dans des formats autres que ceux du Socle Minimal (EDIFACT, ...)' WHERE `attribute_translations`.`attribute_id` = 246; ");


        DB::statement("UPDATE `attributes` SET `admin_name` = 'Décrire comment est garantie la confidentialité des données' WHERE `attributes`.`id` = 484; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Décrire comment est garantie la confidentialité des données' WHERE `attribute_translations`.`attribute_id` = 484; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Décrire comment est garantie la confidentialité des données' WHERE `attribute_translations`.`attribute_id` = 484; ");



        DB::statement("UPDATE `attributes` SET `admin_name` = 'Préciser si la facturation est à l\'emission et/ou à la réception de facture, les conditions de la gratuité, autre…)' WHERE `attributes`.`id` = 482; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Préciser si la facturation est à l\'emission et/ou à la réception de facture, les conditions de la gratuité, autre…)' WHERE `attribute_translations`.`attribute_id` = 482; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Préciser si la facturation est à l\'emission et/ou à la réception de facture, les conditions de la gratuité, autre…)' WHERE `attribute_translations`.`attribute_id` = 482; ");

        DB::statement("UPDATE `attributes` SET `is_filterable` = 1 WHERE `attributes`.`id` = 246; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = 0 WHERE `attributes`.`id` = 330; ");
        DB::statement("UPDATE `attributes` SET `is_filterable` = 0 WHERE `attributes`.`id` = 341; ");
        DB::statement("UPDATE `attributes` SET `max_length` = 100 WHERE `attributes`.`id` = 481; ");







    }


};
