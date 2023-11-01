<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonContractProduct extends Model
{
    use HasFactory;

    public $timestamps = false;
    // La tabella associata al modello, in questo caso "tyfon_contract_products"
    protected $table = 'tyfon_contract_products';

    // L'ID primario della tabella, in questo caso "idProdottoContratto"
    protected $primaryKey = 'idProdottoContratto';

    // Gli attributi che sono assegnabili in massa.
    protected $fillable = [
        'idContratto',
        'Attributo',
        'descArticolo',
        'modello',
        'marca',
        'tipoapparecchio',
        'importo'
    ];

    /**
     * Relazione per il Contratto associato al Prodotto del Contratto.
     */
    public function contract()
    {
        return $this->belongsTo(TyfonContract::class, 'idContratto');
    }
}
