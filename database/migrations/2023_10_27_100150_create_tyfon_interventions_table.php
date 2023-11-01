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
        Schema::create('tyfon_interventions', function (Blueprint $table) {
            $table->id('idIntervento');
            $table->foreignId('idAppuntamento')->nullable();
            $table->string('interventoid')->nullable();
            $table->string('idOrdine')->nullable();
            $table->string('tipoIntervento')->nullable();
            $table->string('statoIntervento')->nullable();
            $table->string('esitoIntervento')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyfon_interventions');
    }
};
