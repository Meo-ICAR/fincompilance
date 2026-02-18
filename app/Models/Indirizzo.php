<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indirizzo extends Model
{
    protected $fillable = [
        'indirizzable_id',
        'indirizzable_type',
        'tipo_indirizzo',
        'indirizzo',
        'numero_civico',
        'cap',
        'comune',
        'provincia',
        'codice_stato_estero',
        'codice_interno_sede',
    ];

    protected function casts(): array
    {
        return [
            'tipo_indirizzo' => 'string',
        ];
    }
}
