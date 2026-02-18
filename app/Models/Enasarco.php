<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enasarco extends Model
{
    protected $fillable = [
        'competenza',
        'enasarco',
        'minimo',
        'massimo',
        'minimale',
        'massimale',
        'aliquota_soc',
        'aliquota_agente',
    ];

    protected function casts(): array
    {
        return [
            'competenza' => 'integer',
            'enasarco' => 'string',
            'minimo' => 'decimal:2',
            'massimo' => 'decimal:2',
            'minimale' => 'decimal:2',
            'massimale' => 'decimal:2',
            'aliquota_soc' => 'decimal:2',
            'aliquota_agente' => 'decimal:2',
        ];
    }
}
