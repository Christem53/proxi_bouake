<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
    {
        Schema::create('prestataires', function (Blueprint $table) {

            $table->id();

            // Utilisateur
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Catégorie
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();

            // Informations professionnelles
            $table->string('nom_entreprise')->nullable();
            $table->string('photo')->nullable();
            $table->text('description');

            // Contacts
            $table->string('whatsapp');

            // Localisation
            $table->string('ville');
            $table->string('quartier');
            $table->string('adresse')->nullable();

            // Expérience
            $table->unsignedTinyInteger('experience')->default(0);

            // Disponibilité
            $table->boolean('disponible')->default(true);

            // Validation par l'administrateur
            $table->enum('statut', [
                'en_attente',
                'accepte',
                'refuse'
            ])->default('en_attente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestataires');
    }
};
