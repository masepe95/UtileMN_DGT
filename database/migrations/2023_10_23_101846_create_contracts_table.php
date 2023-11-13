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
            $table->string('sono_un', 100)->nullable();
            $table->string('codice_agenzia', 100)->nullable();
            $table->string('ragione_sociale', 100)->nullable();
            $table->string('nome_legale_rappresentante_nome', 100)->nullable();
            $table->string('nome_legale_rappresentante_cognome', 100)->nullable();
            $table->string('partita_iva', 100)->nullable();
            $table->string('codice_fiscale', 100)->nullable();
            $table->string('modalità_di_pagamento', 100)->nullable();
            $table->string('codice_iban', 100)->nullable();
            $table->string('indirizzo_sede_legale', 100)->nullable();
            $table->string('numero_civico_sede_legale', 100)->nullable();
            $table->string('comune_sede_legale', 100)->nullable();
            $table->string('provincia_sede_legale', 100)->nullable();
            $table->string('cap_codice_postale_sede_legale', 100)->nullable();
            $table->string('toponimo_sede_legale', 100)->nullable();
            $table->string('telefono_sede_legale', 100)->nullable();
            $table->string('pec_azienda', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('flag_si_no_conferma_invio_comunicazioni_via_email', 100)->nullable();
            $table->string('codice_destinatario', 100)->nullable();
            $table->string('pec_fatturazione', 100)->nullable();
            $table->string('modalità_inoltro_fattura', 100)->nullable();
            $table->string('settore_ateco', 100)->nullable();
            $table->string('sottosettore_ateco', 100)->nullable();
            $table->string('nome_referente_amministrativo', 100)->nullable();
            $table->string('cognome_referente_amministrativo', 100)->nullable();
            $table->string('email_referente_amministrativo', 100)->nullable();
            $table->string('telefono_referente_amministrativo', 100)->nullable();
            $table->string('cellulare_referente_amministrativo', 100)->nullable();
            $table->string('flag_si_no_invio_fatture_via_email', 100)->nullable();
            $table->string('email_inoltro_fatture_1', 100)->nullable();
            $table->string('email_inoltro_fatture_2', 100)->nullable();
            $table->string('email_inoltro_fatture_3', 100)->nullable();
            $table->string('flag_si_no_richede_fattura_multi_pdp', 100)->nullable();
            $table->string('presso_fatturazione', 100)->nullable();
            $table->string('toponimo_fatturazione', 100)->nullable();
            $table->string('indirizzo_fatturazione', 100)->nullable();
            $table->string('numero_civico_fatturazione', 100)->nullable();
            $table->string('comune_fatturazione', 100)->nullable();
            $table->string('provincia_fatturazione', 100)->nullable();
            $table->string('cap_codice_postale_fatturazione', 100)->nullable();
            $table->string('pod_codice_pod', 100)->nullable();
            $table->string('pod_consumi_annuo_kwh', 100)->nullable();
            $table->string('pod_tipo_pod', 100)->nullable();
            $table->string('pod_codice_merceologico_dati_catastali', 100)->nullable();
            $table->string('pod_edificio_dati_catastali', 100)->nullable();
            $table->string('pod_interno_dati_catastali', 100)->nullable();
            $table->string('pod_piano_dati_catastali', 100)->nullable();
            $table->string('pod_in_qualita_di_dati_catastali', 100)->nullable();
            $table->string('pod_comune_amminstrativo_dati_catastali', 100)->nullable();
            $table->string('pod_comune_catastale_dati_catastali', 100)->nullable();
            $table->string('pod_codice_comune_catastale_dati_catastali', 100)->nullable();
            $table->string('pod_tipo_unità_dati_catastali', 100)->nullable();
            $table->string('pod_foglio_dati_catastali', 100)->nullable();
            $table->string('pod_sezione_dati_catastali', 100)->nullable();
            $table->string('pod_particella_dati_catastali', 100)->nullable();
            $table->string('pod_subalterno_dati_catastali', 100)->nullable();
            $table->string('pod_estensione_particella_dati_catastali', 100)->nullable();
            $table->string('pod_tipo_particella_dati_catastali', 100)->nullable();
            $table->string('pod_motivo_di_non_compilazione_dati_catastali', 100)->nullable();
            $table->string('pod_data_modulo', 100)->nullable();
            $table->string('pod_firma_cliente', 100)->nullable();
            $table->string('pod_indirizzo_fornitura', 100)->nullable();
            $table->string('pod_numero_civico_fornitura', 100)->nullable();
            $table->string('pod_comune_fornitura', 100)->nullable();
            $table->string('pod_provincia_fornitura', 100)->nullable();
            $table->string('pod_cap_codice_postale_fornitura', 100)->nullable();
            $table->string('pod_toponimo_fornitura', 100)->nullable();
            $table->string('pod_dati_voltura_cognome_e_nome_o_ragione_sociale_precedente', 100)->nullable();
            $table->string('pod_dati_voltura_codice_fiscale_titolare_precedente', 100)->nullable();
            $table->string('pod_dati_voltura_partita_iva_titolare_precedente', 100)->nullable();
            $table->string('pod_mercato_provenienza', 100)->nullable();
            $table->string('pod_codice_uso', 100)->nullable();
            $table->string('pod_tensione_v', 100)->nullable();
            $table->string('pod_potenza_impegnata_a_contratto_kw', 100)->nullable();
            $table->string('pod_imposte_erariali', 100)->nullable();
            $table->string('pod_imposte_erariali_valore_percentuale', 100)->nullable();
            $table->string('pod_trattamento_iva', 100)->nullable();
            $table->string('pod_esenzione_iva', 100)->nullable();
            $table->string('pod_esenzione_iva_dichiarazione_intenti', 100)->nullable();
            $table->string('pod_esenzione_iva_data_ricezione', 100)->nullable();
            $table->string('pod_esenzione_iva_data_inizio', 100)->nullable();
            $table->string('pod_esenzione_iva_data_fine', 100)->nullable();
            $table->string('pod_precheck_sii_precedente_fornitore_', 100)->nullable();
            $table->string('pod_distributore_locale', 100)->nullable();
            $table->string('pod_modalità_cambio_fornitore', 100)->nullable();
            $table->string('pod_modalità_cambio_fornitore_data_inizio_recesso_stimato', 100)->nullable();
            $table->string('pod_offerta_acquistata', 100)->nullable();
            $table->string('pod_codice_promo', 100)->nullable();
            $table->string('pod_frequenza_fatturazione', 100)->nullable();
            $table->string('pod_dettaglio_fatturazione', 100)->nullable();
            $table->string('pod_inizio_stimato_fornitura', 100)->nullable();
            $table->string('codice_per_la_firma_digitale_del_contratto', 100)->nullable();
            $table->string('creato_da_id_dell_utente', 100)->nullable();
            $table->string('id_registrazione', 100)->nullable();
            $table->string('data_della_registrazione', 100)->nullable();
            $table->string('url_sorgente', 100)->nullable();
            $table->string('id_transazione', 100)->nullable();
            $table->string('importo_del_pagamento', 100)->nullable();
            $table->string('data_pagamento', 100)->nullable();
            $table->string('stato_del_pagamento', 100)->nullable();
            $table->string('id_articolo', 100)->nullable();
            $table->string('user_agent', 100)->nullable();
            $table->string('ip_utente', 100)->nullable();
            $table->string('note_per_backoffice', 100)->nullable();
            $table->string('privacy_profilazione_sino', 100)->nullable();
            $table->string('privacy_cessione_terzi_sino', 100)->nullable();
            $table->string('file_path', 100)->nullable();
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
