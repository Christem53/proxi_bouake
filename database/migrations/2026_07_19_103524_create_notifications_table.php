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
    Schema::create('notifications', function (Blueprint $table) {

        $table->id();

        $table->foreignId('prestataire_id')
              ->constrained('prestataires')
              ->cascadeOnDelete();

        $table->foreignId('demande_id')
              ->constrained('demandes')
              ->cascadeOnDelete();

        $table->text('message');

        $table->boolean('lu')
              ->default(false);

        $table->timestamps();

    });
}
};
