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
        Schema::create('tyfon_contract_products', function (Blueprint $table) {
            $table->id('idProdottoContratto');
            $table->foreignId('idContratto')->nullable();
            $table->string('Attributo')->nullable();
            $table->string('descArticolo')->nullable();
            $table->string('modello')->nullable();
            $table->string('marca')->nullable();
            $table->string('tipoapparecchio')->nullable();
            $table->string('importo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyfon_contract_products');
    }
};
