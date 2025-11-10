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
        DB::statement("update `attributes` set `admin_name` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel) , Si non, lesquelles sont assurées ?' where `id` = 260");
        DB::statement("update `attribute_translations` set `name` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel) , Si non, lesquelles sont assurées ?' where `id` = 519; ");
        DB::statement("update `attribute_translations` set `name` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel) , Si non, lesquelles sont assurées ?' where `id` = 520; ");
        DB::statement("insert into `attributes` (`admin_name`, `type`, `default_value`, `regex`, `max_length`, `is_visible_on_front`, `code`, `is_filterable`, `updated_at`, `created_at`) values ('Nombre de PDP interfacées avc la PDP , avec lesquelles ?','text', '', '', '', 1, 'H6yTYbgysZW2aCBn', 0, '2024-12-27 19:24:12', '2024-12-27 19:24:12');  ");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('en', 459, 'Nombre de PDP interfacées avc la PDP , avec lesquelles ?')");
        DB::statement("insert into `attribute_translations` (`locale`, `attribute_id`, `name`) values ('fr', 459, 'Nombre de PDP interfacées avc la PDP , avec lesquelles ?')");
        DB::statement("update `attribute_translations` set `name` = 'Peut envoyer et recevoir des factures électroniques sous des formats autres que ceux du Socle minimal' where `id` = 491;");
        DB::statement("update `attribute_translations` set `name` = 'Peut envoyer et recevoir des factures électroniques sous des formats autres que ceux du Socle minimal' where `id` = 492;");
        DB::statement("update `attribute_translations` set `name` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel)' where `id` = 517;");
        DB::statement("update `attribute_translations` set `name` = 'Gestion du cycle entier de facturation (création, validation des factures reçues, numérisation, reporting opérationnel)' where `id` = 518;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
