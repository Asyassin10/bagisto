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
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 460; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 463; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 246; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 454; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 473; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 480; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 475; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 484; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 482; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 479; ");
        DB::statement("UPDATE `attributes` SET `default_value` = NULL WHERE `attributes`.`id` = 485; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'La PDP fait partie d\'une suite logicielle, si oui, laquelle ?' WHERE `attributes`.`id` = 463; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'La PDP fait partie d\'une suite logicielle, si oui, laquelle ?' WHERE `attribute_translations`.`id` = 925; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'La PDP fait partie d\'une suite logicielle, si oui, laquelle ?' WHERE `attribute_translations`.`id` = 926; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing, si oui, lesquels ?' WHERE `attributes`.`id` = 481; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing, si oui, lesquels ?' WHERE `attribute_translations`.`id` = 961; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Envoi et réception des factures électroniques sur des formats autres que ceux du Socle Minimal (EDIFACT, ...) hors obligation e-invoicing, si oui, lesquels ?' WHERE `attribute_translations`.`id` = 962; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires, si oui, lesquels ?' WHERE `attributes`.`id` = 249; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires, si oui, lesquels ?' WHERE `attribute_translations`.`id` = 497; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Nombre de statuts du cycle de vie gérés en dehors des statuts obligatoires, si oui, lesquels ?' WHERE `attribute_translations`.`id` = 498; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Génération d\'un e-reporting normé à partir de plusieurs sources (caisses, logiciel dédié …)' WHERE `attributes`.`id` = 428; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Génération d\'un e-reporting normé à partir de plusieurs sources (caisses, logiciel dédié …)' WHERE `attribute_translations`.`id` = 855; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Génération d\'un e-reporting normé à partir de plusieurs sources (caisses, logiciel dédié …)' WHERE `attribute_translations`.`id` = 856; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Sur les 36 cas d\'usage décrits initialement dans les spécifications, combien en gère la PDP ? Et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attributes`.`id` = 454; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage décrits initialement dans les spécifications, combien en gère la PDP ? Et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attribute_translations`.`id` = 907; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Sur les 36 cas d\'usage décrits initialement dans les spécifications, combien en gère la PDP ? Et si oui, pouvez-vous indiquer les N° de cas d\'usage ?' WHERE `attribute_translations`.`id` = 908; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Signature / scellement des factures électroniques intégré, si oui, la solution utilisée.' WHERE `attributes`.`id` = 258; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'UPDATE `attributes` SET `admin_name` = \'Signature / scellement des factures électroniques intégré, si oui, la solution utilisée.\' WHERE `attributes`.`id` = 258; ' WHERE `attribute_translations`.`id` = 515; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'UPDATE `attributes` SET `admin_name` = \'Signature / scellement des factures électroniques intégré, si oui, la solution utilisée.\' WHERE `attributes`.`id` = 258; ' WHERE `attribute_translations`.`id` = 516; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'API disponibles, si oui, lesquelles ?' WHERE `attributes`.`id` = 55; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'API disponibles, si oui, lesquelles ?' WHERE `attribute_translations`.`id` = 109; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'API disponibles, si oui, lesquelles ?' WHERE `attribute_translations`.`id` = 110; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Intégration comptable, si oui avec quels éditeurs ?' WHERE `attributes`.`id` = 266; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Intégration comptable, si oui avec quels éditeurs ?' WHERE `attribute_translations`.`id` = 531; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Intégration comptable, si oui avec quels éditeurs ?' WHERE `attribute_translations`.`id` = 532; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Plan de récupération en cas de cyberattaque' WHERE `attributes`.`id` = 342; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Plan de récupération en cas de cyberattaque' WHERE `attribute_translations`.`id` = 683; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Plan de récupération en cas de cyberattaque' WHERE `attribute_translations`.`id` = 684; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Plan de récupération en cas de cyber attaque, si oui décrire.' WHERE `attributes`.`id` = 453; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Plan de récupération en cas de cyber attaque, si oui décrire.' WHERE `attribute_translations`.`id` = 905; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Plan de récupération en cas de cyber attaque, si oui décrire.' WHERE `attribute_translations`.`id` = 906; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Hotline' WHERE `attributes`.`id` = 343; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline' WHERE `attribute_translations`.`id` = 685; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline' WHERE `attribute_translations`.`id` = 686; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Hotline, si oui horaires.' WHERE `attributes`.`id` = 87; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline, si oui horaires.' WHERE `attribute_translations`.`id` = 173; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline, si oui horaires.' WHERE `attribute_translations`.`id` = 174; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Support situé en France' WHERE `attributes`.`id` = 476; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Support situé en France' WHERE `attribute_translations`.`id` = 951; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Support situé en France' WHERE `attribute_translations`.`id` = 952; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Mode de tarification, si gratuit, préciser les conditions de gratuité ?' WHERE `attributes`.`id` = 482; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Mode de tarification, si gratuit, préciser les conditions de gratuité ?' WHERE `attribute_translations`.`id` = 963; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Mode de tarification, si gratuit, préciser les conditions de gratuité ?' WHERE `attribute_translations`.`id` = 964; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Coût de maintenance inclus, si non montant.' WHERE `attributes`.`id` = 451; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Coût de maintenance inclus, si non montant.' WHERE `attribute_translations`.`id` = 901; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Coût de maintenance inclus, si non montant.' WHERE `attribute_translations`.`id` = 902; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Hotline incluse, si non montant.' WHERE `attributes`.`id` = 479; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline incluse, si non montant.' WHERE `attribute_translations`.`id` = 957; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline incluse, si non montant.' WHERE `attribute_translations`.`id` = 958; ");
        // ----------------------------------------------------------------
        DB::statement("UPDATE `attributes` SET `admin_name` = 'Hotline incluse' WHERE `attributes`.`id` = 478; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline incluse' WHERE `attribute_translations`.`id` = 955; ");
        DB::statement("UPDATE `attribute_translations` SET `name` = 'Hotline incluse' WHERE `attribute_translations`.`id` = 956; ");




















    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
