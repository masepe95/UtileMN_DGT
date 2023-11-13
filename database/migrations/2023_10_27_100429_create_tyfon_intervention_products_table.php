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
        Schema::create('tyfon_intervention_products', function (Blueprint $table) {
            $table->id('idProdottoIntervento');
            $table->foreignId('idIntervento')->nullable();
            $table->string('Descrizione')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('Qta')->nullable();
            $table->string('Cd_ARGruppo2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyfon_intervention_products');
    }
};
