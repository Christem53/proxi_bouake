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
        Schema::create('prestations', function (Blueprint $table) {
            $table->id();

     $table->foreignId('user_id')
          ->constrained()
         ->cascadeOnDelete();

    $table->foreignId('category_id')
      ->constrained()
      ->cascadeOnDelete();

    $table->string('titre');

    $table->text('description');

    $table->decimal('prix',10,2)->nullable();

    $table->string('image')->nullable();

    $table->enum('statut', [
    'en_attente',
    'actif',
    'refuse'
])->default('en_attente');

    $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestations');
    }
};
