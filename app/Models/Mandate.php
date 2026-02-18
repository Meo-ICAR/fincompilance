<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mandate extends Model
{
    protected $fillable = [
        'financial_institution_id',
        'codice_mandato_interno',
        'start_date',
        'end_date',
        'is_active',
        'authorized_products',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_active' => 'boolean',
            'authorized_products' => 'array',
        ];
    }

    public function financialInstitution(): BelongsTo
    {
        return $this->belongsTo(Financial::class);
    }
}
