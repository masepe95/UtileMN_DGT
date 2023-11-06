<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonInterventionProduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tyfon_intervention_products';

    // L'ID primario della tabella, in questo caso "idProdottoIntervento"
    protected $primaryKey = 'idProdottoIntervento';

    // Gli attributi che sono assegnabili in massa.
    protected $fillable = [
        'idProdottoIntervento',
        'idIntervento',
        'Descrizione',
        'Tipologia',
        'Qta'
    ];



    /**
     * Relazione per l'Intervento associato al Prodotto dell'Intervento.
     */
    public function intervention()
    {
        return $this->belongsTo(TyfonIntervention::class, 'idIntervento');
    }
}
