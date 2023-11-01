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
        Schema::create('tyfon_contracts', function (Blueprint $table) {
            $table->id('idContratto');
            $table->foreignId('idAppuntamento')->nullable();
            $table->string('dataAppuntamento')->nullable();
            $table->string('tecnico')->nullable();
            $table->string('idLead')->nullable();
            $table->string('codiceMetanoNord')->nullable();
            $table->string('commessa')->nullable();
            $table->string('note')->nullable();
            $table->string('annullato')->nullable();
            $table->string('statoSegnalazione')->nullable();
            $table->string('tipologiaProdotto')->nullable();
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
            $table->string('idService')->nullable();
            $table->string('tipologiaAttivazione')->nullable();
            $table->string('data_appuntamento')->nullable();
            $table->string('datadecorrenzacontratto')->nullable();
            $table->string('datastipula')->nullable();
            $table->string('dataAttivazione')->nullable();
            $table->string('dataultimamanutenzione')->nullable();
            $table->string('dataprossimamanutenzione')->nullable();
            $table->string('datachiusuracontratto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyfon_contracts');
    }
};
