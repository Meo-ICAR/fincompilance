<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $fillable = [
        'abi_code',
        'name',
        'type',
        'capogruppo',
        'status',
        'data_iscrizione',
        'data_cancellazione',
    ];

    protected function casts(): array
    {
        return [
            'type' => 'string',
            'data_iscrizione' => 'date',
            'data_cancellazione' => 'date',
        ];
    }
}
