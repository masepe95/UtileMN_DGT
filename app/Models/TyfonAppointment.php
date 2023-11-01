<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonAppointment extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAppuntamento';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    // La tabella associata al modello, in questo caso "tyfon_appointments"
    protected $table = 'tyfon_appointments';

    // Gli attributi che sono assegnabili in massa.
    protected $fillable = [
        'idAppuntamento',
        'dataAppuntamento',
        'tecnico',
        'accettataFinanziaria',
        'idLead',
        'codiceMetanoNord',
        'commessa',
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
        'note',
        'annullato',
        'statoSegnalazione',
    ];

    public function lead()
    {
        return $this->belongsTo(TyfonLead::class, 'idLead');
    }

    public function interventions()
    {
        return $this->hasMany(TyfonIntervention::class, 'idAppuntamento');
    }

    public function contract()
    {
        return $this->hasOne(TyfonContract::class, 'idAppuntamento');
    }
}
