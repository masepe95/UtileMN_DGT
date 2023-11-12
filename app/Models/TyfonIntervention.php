<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonIntervention extends Model
{
    use HasFactory;

    public $timestamps = false;

    // La tabella associata al modello, in questo caso "tyfon_interventions"
    protected $table = 'tyfon_interventions';

    // L'ID primario della tabella, in questo caso "idIntervento"
    protected $primaryKey = 'idIntervento';

    // Gli attributi che sono assegnabili in massa.
    protected $fillable = [
        'idAppuntamento',
        'idIntervento',
        'idOrdine',
        'tipoIntervento',
        'statoIntervento',
        'esitoIntervento'
    ];
    public function appointment()
    {
        return $this->belongsTo(TyfonAppointment::class, 'idAppuntamento');
    }

    public function products()
    {
        return $this->hasMany(TyfonInterventionProduct::class, 'idIntervento');
    }
}
