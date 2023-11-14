<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\TyfonUser;


class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    private $ids;

    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        // Carica l'utente con tutte le relazioni necessarie
        return TyfonUser::with(['appointments', 'contracts']) // sostituisci con le tue relazioni
            ->whereIn('cf', $this->ids)
            ->get();
    }

    public function map($user): array
    {
        // Mappa i dati dell'utente e delle sue relazioni in una riga di Excel
        return [
            $user->cognome,
            $user->nome,
            $user->cf,
            $user->ragsoc, // Ragione Sociale
            $user->piva,   // Partita IVA
            $user->telefono,
            $user->email,
            $user->indirizzo,
            $user->civico,
            $user->cap,
            $user->comune,
            $user->provincia,
            $user->note,
            // Aggiungi qui altri campi se necessario
            $user->appointments,
            // $user->appointments->dataAppuntamento,
            // $user->appointments->statoSegnalazione,
            // $user->appointments->annullato,
            $user->contracts,
            // $user->contracts->statoSegnalazione,
            // $user->contracts->tipologiaProdotto,
            // $user->contracts->datastipula,
            // $user->contracts->dataAttivazione,
            // $user->contracts->dataultimamanutenzione,
            // $user->contracts->dataprossimamanutenzione,
            // $user->contracts->datachiusuracontratto,
            // Includi qui gli altri attributi e le relazioni
            // Ad esempio: $user->relation1->campo
        ];
    }

    public function headings(): array
    {
        // Intestazioni per il foglio Excel
        return [
            'Cognome',
            'Nome',
            'Codice Fiscale',
            'Ragione Sociale',
            'Partita IVA',
            'Telefono',
            'E-Mail',
            'Indirizzo',
            'Civico',
            'CAP',
            'Comune',
            'Provincia',
            'Note',
            'Appuntamenti',
            'Contratti',
            // 'idAppuntamento',
            // 'Data Appuntamento',
            // 'Stato Segnalazione Appuntamento',
            // 'Appuntamento Annullato',
            // 'IDLead Contratto',
            // 'Stato Segnalazione Contratto',
            // 'Tipologia Prodotto Contratto',
            // 'Data Stipula Contratto',
            // 'Data Attivazione Contratto',
            // 'Data Ultima Manutenzione',
            // 'Data Prossima Manutenzione',
            // 'Data Chiusura Contratto',

            // Altre intestazioni per le relazioni
        ];
    }
}
