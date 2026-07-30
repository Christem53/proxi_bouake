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
    Schema::create('demandes', function (Blueprint $table) {

        $table->id();

        // Client
        $table->foreignId('client_id')
            ->constrained('users')
            ->cascadeOnDelete();

        // Prestataire
        $table->foreignId('prestataire_id')
            ->constrained('prestataires')
            ->cascadeOnDelete();

        // Prestation demandée
        $table->foreignId('prestation_id')
            ->constrained('prestations')
            ->cascadeOnDelete();

        // Message du client
        $table->text('message')->nullable();

        // Statut de la demande
        $table->enum('statut', [
            'en_attente',
            'acceptee',
            'refusee',
            'terminee'
        ])->default('en_attente');

        $table->timestamps();
    });
}
};
