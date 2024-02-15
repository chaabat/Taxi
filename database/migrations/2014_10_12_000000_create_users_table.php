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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('picture')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('phone')->nullable();
            $table->string('description')->nullable();
            $table->string('matricule')->nullable();
            $table->enum('vehicule', ['Voiture', 'Pick-up', 'Honda','Car','Camion'])->nullable();
            $table->string('average')->nullable();
            $table->enum('statut', ['disponible', 'indisponible'])->nullable();
            $table->enum('payment', ['Especes', 'Carte'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
