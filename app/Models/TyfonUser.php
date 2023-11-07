<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyfonUser extends Model
{
    use HasFactory;

    protected $table = 'tyfon_users';

    // Impostiamo 'cf' come chiave primaria
    protected $primaryKey = 'cf';

    // Disabilitiamo l'incremento automatico poiché 'cf' è una stringa
    public $incrementing = false;

    // Specifica il tipo della chiave primaria come stringa
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'cf',
        'id_lead',
        'cognome',
        'nome',
        'ragsoc',
        'piva',
        'telefono',
        'email',
        'indirizzo',
        'civico',
        'cap',
        'comune',
        'provincia',
        'note'
    ];

    public function appointments()
    {
        return $this->hasMany(TyfonAppointment::class, 'cf');
    }

    public function contracts()
    {
        return $this->hasMany(TyfonContract::class, 'cf');
    }
}
