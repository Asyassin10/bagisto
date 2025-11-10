<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de société
            $table->string('adresse'); // Adresse du siège de l'entreprise
            $table->string('site_web'); // Site web de l'entreprise
            $table->string('siren'); // SIREN de l'entreprise
            $table->string('contact_nom'); // Nom du contact principal
            $table->string('contact_prenom'); // Prénom du contact principal
            $table->string('contact_fonction'); // Fonction du contact principal
            $table->string('contact_telephone'); // Téléphone du contact principal
            $table->string('contact_email'); // Email du contact principal
            $table->string('logo')->nullable(); // Logo
            $table->text('description')->nullable(); // Présentation de l'entreprise
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('societes');
    }
};
