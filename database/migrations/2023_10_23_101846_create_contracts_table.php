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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('agenzia')->nullable();
            $table->string('ragione_sociale')->nullable();
            $table->string('nome_referente')->nullable();
            $table->string('cognome_referente')->nullable();
            $table->string('partita_iva')->nullable();
            $table->string('codice_fiscale_business')->nullable();
            $table->string('tipo_pagamento')->nullable();
            $table->string('codice_iban')->nullable();
            $table->string('indirizzo_intestatario')->nullable();
            $table->string('numero_civico_intestatario')->nullable();
            $table->string('localita_intestatario_label')->nullable();
            $table->string('localita_intestatario_provincia')->nullable();
            $table->string('localita_intestatario_cap')->nullable();
            $table->string('tipo_indirizzo_intestatario')->nullable();
            $table->string('cellulare_intestatario')->nullable();
            $table->string('pec')->nullable();
            $table->string('email_intestatario')->nullable();
            $table->string('consenso_marketing')->nullable();
            $table->string('codice_destinatario')->nullable();
            $table->string('modalita_inoltro_fattura')->nullable();
            $table->string('classificazioni_ateco')->nullable();
            $table->string('classificazioni_ateco_ateco')->nullable();
            $table->string('modalita_bolletta')->nullable();
            $table->string('modalita_bolletta_diversa_email')->nullable();
            $table->string('tipo_indirizzo_fatturazione')->nullable();
            $table->string('indirizzo_fatturazione')->nullable();
            $table->string('numero_civico_fatturazione')->nullable();
            $table->string('localita_fatturazione_label')->nullable();
            $table->string('localita_fatturazione_provincia')->nullable();
            $table->string('localita_fatturazione_cap')->nullable();
            $table->string('ele_pod')->nullable();
            $table->string('ele_consumo_annuo')->nullable();
            $table->string('titolarita_fornitura')->nullable();
            $table->string('indirizzo_fornitura')->nullable();
            $table->string('numero_civico_fornituraas')->nullable();
            $table->string('localita_fornitura_label')->nullable();
            $table->string('localita_fornitura_provincia')->nullable();
            $table->string('localita_fornitura_cap')->nullable();
            $table->string('tipo_indirizzo_fornitura')->nullable();
            $table->string('ele_mercato_provenienza')->nullable();
            $table->string('ele_codice_uso')->nullable();
            $table->string('ele_tensione')->nullable();
            $table->string('ele_potenza_impegnata')->nullable();
            $table->string('ele_imposte_erariali_item_key')->nullable();
            $table->string('ele_imposte_erariali_perc')->nullable();
            $table->string('ele_trattamento_iva')->nullable();
            $table->string('ele_tipo_esenzione_eva')->nullable();
            $table->string('ele_modalita_cambio_fornitore')->nullable();
            $table->string('prodotto_ele_code')->nullable();
            $table->string('username')->nullable();
            $table->string('signed_at')->nullable();
            $table->string('consenso_profilazione')->nullable();
            $table->string('consenso_terzi')->nullable();
            $table->string('esito')->nullable();
            $table->string('file_path')->nullable();
            $table->string('form_created_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
