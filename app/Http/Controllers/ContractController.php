<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dei campi
        $validatedData = $request->validate([
            'file' => 'required|mimes:zip|max:20480',
            'sono_un' => 'nullable|string',
            'codice_agenzia' => 'nullable|string',
            'ragione_sociale' => 'nullable|string',
            'nome_legale_rappresentante_nome' => 'nullable|string',
            'nome_legale_rappresentante_cognome' => 'nullable|string',
            'partita_iva' => 'nullable|string',
            'codice_fiscale' => 'nullable|string',
            'modalità_di_pagamento' => 'nullable|string',
            'codice_iban' => 'nullable|string',
            'indirizzo_sede_legale' => 'nullable|string',
            'numero_civico_sede_legale' => 'nullable|string',
            'comune_sede_legale' => 'nullable|string',
            'provincia_sede_legale' => 'nullable|string',
            'cap_codice_postale_sede_legale' => 'nullable|string',
            'toponimo_sede_legale' => 'nullable|string',
            'telefono_sede_legale' => 'nullable|string',
            'pec_azienda' => 'nullable|string',
            'email' => 'nullable|email',
            'flag_si_no_conferma_invio_comunicazioni_via_email' => 'nullable|string',
            'codice_destinatario' => 'nullable|string',
            'pec_fatturazione' => 'nullable|string',
            'modalità_inoltro_fattura' => 'nullable|string',
            'settore_ateco' => 'nullable|string',
            'sottosettore_ateco' => 'nullable|string',
            'nome_referente_amministrativo' => 'nullable|string',
            'cognome_referente_amministrativo' => 'nullable|string',
            'email_referente_amministrativo' => 'nullable|email',
            'telefono_referente_amministrativo' => 'nullable|string',
            'cellulare_referente_amministrativo' => 'nullable|string',
            'flag_si_no_invio_fatture_via_email' => 'nullable|string',
            'email_inoltro_fatture_1' => 'nullable|email',
            'email_inoltro_fatture_2' => 'nullable|email',
            'email_inoltro_fatture_3' => 'nullable|email',
            'flag_si_no_richede_fattura_multi_pdp' => 'nullable|string',
            'presso_fatturazione' => 'nullable|string',
            'toponimo_fatturazione' => 'nullable|string',
            'indirizzo_fatturazione' => 'nullable|string',
            'numero_civico_fatturazione' => 'nullable|string',
            'comune_fatturazione' => 'nullable|string',
            'provincia_fatturazione' => 'nullable|string',
            'cap_codice_postale_fatturazione' => 'nullable|string',
            'pod_codice_pod' => 'nullable|string',
            'pod_consumi_annuo_kwh' => 'nullable|string',
            'pod_tipo_pod' => 'nullable|string',
            'pod_codice_merceologico_dati_catastali' => 'nullable|string',
            'pod_edificio_dati_catastali' => 'nullable|string',
            'pod_interno_dati_catastali' => 'nullable|string',
            'pod_piano_dati_catastali' => 'nullable|string',
            'pod_in_qualita_di_dati_catastali' => 'nullable|string',
            'pod_comune_amminstrativo_dati_catastali' => 'nullable|string',
            'pod_comune_catastale_dati_catastali' => 'nullable|string',
            'pod_codice_comune_catastale_dati_catastali' => 'nullable|string',
            'pod_tipo_unità_dati_catastali' => 'nullable|string',
            'pod_foglio_dati_catastali' => 'nullable|string',
            'pod_sezione_dati_catastali' => 'nullable|string',
            'pod_particella_dati_catastali' => 'nullable|string',
            'pod_subalterno_dati_catastali' => 'nullable|string',
            'pod_estensione_particella_dati_catastali' => 'nullable|string',
            'pod_tipo_particella_dati_catastali' => 'nullable|string',
            'pod_motivo_di_non_compilazione_dati_catastali' => 'nullable|string',
            'pod_data_modulo' => 'nullable|string',
            'pod_firma_cliente' => 'nullable|string',
            'pod_indirizzo_fornitura' => 'nullable|string',
            'pod_numero_civico_fornitura' => 'nullable|string',
            'pod_comune_fornitura' => 'nullable|string',
            'pod_provincia_fornitura' => 'nullable|string',
            'pod_cap_codice_postale_fornitura' => 'nullable|string',
            'pod_toponimo_fornitura' => 'nullable|string',
            'pod_dati_voltura_cognome_e_nome_o_ragione_sociale_precedente' => 'nullable|string',
            'pod_dati_voltura_codice_fiscale_titolare_precedente' => 'nullable|string',
            'pod_dati_voltura_partita_iva_titolare_precedente' => 'nullable|string',
            'pod_mercato_provenienza' => 'nullable|string',
            'pod_codice_uso' => 'nullable|string',
            'pod_tensione_v' => 'nullable|string',
            'pod_potenza_impegnata_a_contratto_kw' => 'nullable|string',
            'pod_imposte_erariali' => 'nullable|string',
            'pod_imposte_erariali_valore_percentuale' => 'nullable|string',
            'pod_trattamento_iva' => 'nullable|string',
            'pod_esenzione_iva' => 'nullable|string',
            'pod_esenzione_iva_dichiarazione_intenti' => 'nullable|string',
            'pod_esenzione_iva_data_ricezione' => 'nullable|string',
            'pod_esenzione_iva_data_inizio' => 'nullable|string',
            'pod_esenzione_iva_data_fine' => 'nullable|string',
            'pod_precheck_sii_precedente_fornitore_' => 'nullable|string',
            'pod_distributore_locale' => 'nullable|string',
            'pod_modalità_cambio_fornitore' => 'nullable|string',
            'pod_modalità_cambio_fornitore_data_inizio_recesso_stimato',
            'pod_offerta_acquistata' => 'nullable|string',
            'pod_codice_promo' => 'nullable|string',
            'pod_frequenza_fatturazione' => 'nullable|string',
            'pod_dettaglio_fatturazione' => 'nullable|string',
            'pod_inizio_stimato_fornitura' => 'nullable|string',
            'codice_per_la_firma_digitale_del_contratto' => 'nullable|string',
            'creato_da_id_dell_utente' => 'nullable|string',
            'id_registrazione' => 'nullable|string',
            'data_della_registrazione' => 'nullable|string',
            'url_sorgente' => 'nullable|string',
            'id_transazione' => 'nullable|string',
            'importo_del_pagamento' => 'nullable|string',
            'data_pagamento' => 'nullable|string',
            'stato_del_pagamento' => 'nullable|string',
            'id_articolo' => 'nullable|string',
            'user_agent' => 'nullable|string',
            'ip_utente' => 'nullable|string',
            'note_per_backoffice' => 'nullable|string',
            'privacy_profilazione_sino' => 'nullable|string',


        ]);

        // Gestisci l'upload del file
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $filename = $request->file->store('contracts', 'public');

            // Prepara i dati del contratto
            $contractData = [
                'file_path' => $filename,
                'sono_un' => $request->input('sono_un'),
                'codice_agenzia' => $request->input('codice_agenzia'),
                'ragione_sociale' => $request->input('ragione_sociale'),
                'nome_legale_rappresentante_nome' => $request->input('nome_legale_rappresentante_nome'),
                'nome_legale_rappresentante_cognome' => $request->input('nome_legale_rappresentante_cognome'),
                'partita_iva' => $request->input('partita_iva'),
                'codice_fiscale' => $request->input('codice_fiscale'),
                'modalità_di_pagamento' => $request->input('modalità_di_pagamento'),
                'codice_iban' => $request->input('codice_iban'),
                'indirizzo_sede_legale' => $request->input('indirizzo_sede_legale'),
                'numero_civico_sede_legale' => $request->input('numero_civico_sede_legale'),
                'comune_sede_legale' => $request->input('comune_sede_legale'),
                'provincia_sede_legale' => $request->input('provincia_sede_legale'),
                'cap_codice_postale_sede_legale' => $request->input('cap_codice_postale_sede_legale'),
                'toponimo_sede_legale' => $request->input('toponimo_sede_legale'),
                'telefono_sede_legale' => $request->input('telefono_sede_legale'),
                'pec_azienda' => $request->input('pec_azienda'),
                'email' => $request->input('email'),
                'flag_si_no_conferma_invio_comunicazioni_via_email' => $request->input('flag_si_no_conferma_invio_comunicazioni_via_email'),
                'codice_destinatario' => $request->input('codice_destinatario'),
                'pec_fatturazione' => $request->input('pec_fatturazione'),
                'modalità_inoltro_fattura' => $request->input('modalità_inoltro_fattura'),
                'settore_ateco' => $request->input('settore_ateco'),
                'sottosettore_ateco' => $request->input('sottosettore_ateco'),
                'nome_referente_amministrativo' => $request->input('nome_referente_amministrativo'),
                'cognome_referente_amministrativo' => $request->input('cognome_referente_amministrativo'),
                'email_referente_amministrativo' => $request->input('email_referente_amministrativo'),
                'telefono_referente_amministrativo' => $request->input('telefono_referente_amministrativo'),
                'cellulare_referente_amministrativo' => $request->input('cellulare_referente_amministrativo'),
                'flag_si_no_invio_fatture_via_email' => $request->input('flag_si_no_invio_fatture_via_email'),
                'email_inoltro_fatture_1' => $request->input('email_inoltro_fatture_1'),
                'email_inoltro_fatture_2' => $request->input('email_inoltro_fatture_2'),
                'email_inoltro_fatture_3' => $request->input('email_inoltro_fatture_3'),
                'flag_si_no_richede_fattura_multi_pdp' => $request->input('flag_si_no_richede_fattura_multi_pdp'),
                'presso_fatturazione' => $request->input('presso_fatturazione'),
                'toponimo_fatturazione' => $request->input('toponimo_fatturazione'),
                'indirizzo_fatturazione' => $request->input('indirizzo_fatturazione'),
                'numero_civico_fatturazione' => $request->input('numero_civico_fatturazione'),
                'comune_fatturazione' => $request->input('comune_fatturazione'),
                'provincia_fatturazione' => $request->input('provincia_fatturazione'),
                'cap_codice_postale_fatturazione' => $request->input('cap_codice_postale_fatturazione'),
                'pod_codice_pod' => $request->input('pod_codice_pod'),
                'pod_consumi_annuo_kwh' => $request->input('pod_consumi_annuo_kwh'),
                'pod_tipo_pod' => $request->input('pod_tipo_pod'),
                'pod_codice_merceologico_dati_catastali' => $request->input('pod_codice_merceologico_dati_catastali'),
                'pod_edificio_dati_catastali' => $request->input('pod_edificio_dati_catastali'),
                'pod_interno_dati_catastali' => $request->input('pod_interno_dati_catastali'),
                'pod_piano_dati_catastali' => $request->input('pod_piano_dati_catastali'),
                'pod_in_qualita_di_dati_catastali' => $request->input('pod_in_qualita_di_dati_catastali'),
                'pod_comune_amminstrativo_dati_catastali' => $request->input('pod_comune_amminstrativo_dati_catastali'),
                'pod_comune_catastale_dati_catastali' => $request->input('pod_comune_catastale_dati_catastali'),
                'pod_codice_comune_catastale_dati_catastali' => $request->input('pod_codice_comune_catastale_dati_catastali'),
                'pod_tipo_unità_dati_catastali' => $request->input('pod_tipo_unità_dati_catastali'),
                'pod_foglio_dati_catastali' => $request->input('pod_foglio_dati_catastali'),
                'pod_sezione_dati_catastali' => $request->input('pod_sezione_dati_catastali'),
                'pod_particella_dati_catastali' => $request->input('pod_particella_dati_catastali'),
                'pod_subalterno_dati_catastali' => $request->input('pod_subalterno_dati_catastali'),
                'pod_estensione_particella_dati_catastali' => $request->input('pod_estensione_particella_dati_catastali'),
                'pod_tipo_particella_dati_catastali' => $request->input('pod_tipo_particella_dati_catastali'),
                'pod_motivo_di_non_compilazione_dati_catastali' => $request->input('pod_motivo_di_non_compilazione_dati_catastali'),
                'pod_data_modulo' => $request->input('pod_data_modulo'),
                'pod_firma_cliente' => $request->input('pod_firma_cliente'),
                'pod_indirizzo_fornitura' => $request->input('pod_indirizzo_fornitura'),
                'pod_numero_civico_fornitura' => $request->input('pod_numero_civico_fornitura'),
                'pod_comune_fornitura' => $request->input('pod_comune_fornitura'),
                'pod_provincia_fornitura' => $request->input('pod_provincia_fornitura'),
                'pod_cap_codice_postale_fornitura' => $request->input('pod_cap_codice_postale_fornitura'),
                'pod_toponimo_fornitura' => $request->input('pod_toponimo_fornitura'),
                'pod_dati_voltura_cognome_e_nome_o_ragione_sociale_precedente' => $request->input('pod_dati_voltura_cognome_e_nome_o_ragione_sociale_precedente'),
                'pod_dati_voltura_codice_fiscale_titolare_precedente' => $request->input('pod_dati_voltura_codice_fiscale_titolare_precedente'),
                'pod_dati_voltura_partita_iva_titolare_precedente' => $request->input('pod_dati_voltura_partita_iva_titolare_precedente'),
                'pod_mercato_provenienza' => $request->input('pod_mercato_provenienza'),
                'pod_codice_uso' => $request->input('pod_codice_uso'),
                'pod_tensione_v' => $request->input('pod_tensione_v'),
                'pod_potenza_impegnata_a_contratto_kw' => $request->input('pod_potenza_impegnata_a_contratto_kw'),
                'pod_imposte_erariali' => $request->input('pod_imposte_erariali'),
                'pod_imposte_erariali_valore_percentuale' => $request->input('pod_imposte_erariali_valore_percentuale'),
                'pod_trattamento_iva' => $request->input('pod_trattamento_iva'),
                'pod_esenzione_iva' => $request->input('pod_esenzione_iva'),
                'pod_esenzione_iva_dichiarazione_intenti' => $request->input('pod_esenzione_iva_dichiarazione_intenti'),
                'pod_esenzione_iva_data_ricezione' => $request->input('pod_esenzione_iva_data_ricezione'),
                'pod_esenzione_iva_data_inizio' => $request->input('pod_esenzione_iva_data_inizio'),
                'pod_esenzione_iva_data_fine' => $request->input('pod_esenzione_iva_data_fine'),
                'pod_precheck_sii_precedente_fornitore_' => $request->input('pod_precheck_sii_precedente_fornitore_'),
                'pod_distributore_locale' => $request->input('pod_distributore_locale'),
                'pod_modalità_cambio_fornitore' => $request->input('pod_modalità_cambio_fornitore'),
                'pod_modalità_cambio_fornitore_data_inizio_recesso_stimato' => $request->input('pod_modalità_cambio_fornitore_data_inizio_recesso_stimato'),
                'pod_offerta_acquistata' => $request->input('pod_offerta_acquistata'),
                'pod_codice_promo' => $request->input('pod_codice_promo'),
                'pod_frequenza_fatturazione' => $request->input('pod_frequenza_fatturazione'),
                'pod_dettaglio_fatturazione' => $request->input('pod_dettaglio_fatturazione'),
                'pod_inizio_stimato_fornitura' => $request->input('pod_inizio_stimato_fornitura'),
                'codice_per_la_firma_digitale_del_contratto' => $request->input('codice_per_la_firma_digitale_del_contratto'),
                'creato_da_id_dell_utente' => $request->input('creato_da_id_dell_utente'),
                'id_registrazione' => $request->input('id_registrazione'),
                'data_della_registrazione' => $request->input('data_della_registrazione'),
                'url_sorgente' => $request->input('url_sorgente'),
                'id_transazione' => $request->input('id_transazione'),
                'importo_del_pagamento' => $request->input('importo_del_pagamento'),
                'data_pagamento' => $request->input('data_pagamento'),
                'stato_del_pagamento' => $request->input('stato_del_pagamento'),
                'id_articolo' => $request->input('id_articolo'),
                'user_agent' => $request->input('user_agent'),
                'ip_utente' => $request->input('ip_utente'),
                'note_per_backoffice' => $request->input('note_per_backoffice'),
                'privacy_profilazione_sino' => $request->input('privacy_profilazione_sino'),
                'privacy_cessione_terzi_sino' => $request->input('privacy_cessione_terzi_sino'),
                // aggiungi qui eventuali altri campi necessari
            ];

            // Crea un nuovo contratto con i dati forniti
            $contract = Contracts::create($contractData);

            return response()->json(['message' => 'Contratto creato con successo!', 'contract' => $contract], 201);
        } else {
            return response()->json(['error' => 'Invalid file upload.'], 400);
        }
    }
}
