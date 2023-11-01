<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonLead extends Model
{
    use HasFactory;

    public $timestamps = false;

    // La tabella associata al modello, in questo caso "tyfon_leads"
    protected $table = 'tyfon_leads';

    // L'ID primario della tabella, in questo caso "idLead"
    protected $primaryKey = 'idLead';

    protected $fillable = [
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
        'codiceVenditore',
        'tipologiaProdotto'
    ];

    public function appointments()
    {
        return $this->hasMany(TyfonAppointment::class, 'idLead');
    }

    public function contracts()
    {
        return $this->hasMany(TyfonContract::class, 'idLead');
    }
}
