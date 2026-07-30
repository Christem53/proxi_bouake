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
    Schema::create('avis', function (Blueprint $table) {
        $table->id();

        $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
        $table->foreignId('prestataire_id')->constrained('prestataires')->cascadeOnDelete();
        $table->foreignId('demande_id')->constrained('demandes')->cascadeOnDelete();

        $table->tinyInteger('note'); // de 1 à 5
        $table->text('commentaire')->nullable();

        $table->timestamps();
    });
}
};
