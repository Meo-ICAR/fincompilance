<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oam extends Model
{
    protected $fillable = [
        'name',
        'autorizzato_ad_operare',
        'persona',
        'codice_fiscale',
        'domicilio_sede_legale',
        'elenco',
        'numero_iscrizione',
        'data_iscrizione',
        'stato',
        'data_stato',
        'causale_stato_note',
    ];

    protected function casts(): array
    {
        return [
            'data_iscrizione' => 'date',
            'data_stato' => 'date',
        ];
    }
}
