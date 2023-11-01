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
        Schema::create('tyfon_leads', function (Blueprint $table) {
            $table->id('idLead');
            $table->string('codiceMetanoNord')->nullable();
            $table->string('commessa')->nullable();
            $table->string('cognome')->nullable();
            $table->string('nome')->nullable();
            $table->string('cf')->nullable();
            $table->string('ragsoc')->nullable();
            $table->string('piva')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('indirizzo')->nullable();
            $table->string('civico')->nullable();
            $table->string('cap')->nullable();
            $table->string('comune')->nullable();
            $table->string('provincia')->nullable();
            $table->string('note')->nullable();
            $table->foreignId('codiceVenditore')->nullable();
            $table->string('tipologiaProdotto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyfon_leads');
    }
};
