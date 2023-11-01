<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonContract extends Model
{
    use HasFactory;

    public $timestamps = false;

    // La tabella associata al modello, in questo caso "tyfon_contracts"
    protected $table = 'tyfon_contracts';

    // L'ID primario della tabella, in questo caso "idContratto"
    protected $primaryKey = 'idContratto';

    // Gli attributi che sono assegnabili in massa.
    protected $fillable = [
        'idAppuntamento',
        'dataAppuntamento',
        'tecnico',
        'idLead',
        'codiceMetanoNord',
        'commessa',
        'note',
        'annullato',
        'statoSegnalazione',
        'tipologiaProdotto',
        'cognome',
        'nome',
        'cf',
        'ragsoc',
        'piva',
        'telefono',
        'email',
        'indirizzo',
        'civico',
        'cap',
        'comune',
        'provincia',
        'idService',
        'tipologiaAttivazione',
        'data_appuntamento',
        'datadecorrenzacontratto',
        'datastipula',
        'dataAttivazione',
        'dataultimamanutenzione',
        'dataprossimamanutenzione',
        'datachiusuracontratto'
    ];

    public function appointment()
    {
        return $this->belongsTo(TyfonAppointment::class, 'idAppuntamento');
    }

    public function lead()
    {
        return $this->belongsTo(TyfonLead::class, 'idLead');
    }

    public function contractProducts()
    {
        return $this->hasMany(TyfonContractProduct::class, 'idContratto');
    }
}
