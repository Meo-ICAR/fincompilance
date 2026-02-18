<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AmlBeneficialOwner extends Model
{
    protected $fillable = [
        'aml_assessment_id',
        'nome',
        'cognome',
        'codice_fiscale',
        'data_nascita',
        'comune_nascita',
        'ownership_percentage',
        'is_indirect_ownership',
    ];

    protected function casts(): array
    {
        return [
            'data_nascita' => 'date',
            'ownership_percentage' => 'decimal:2',
            'is_indirect_ownership' => 'boolean',
        ];
    }

    public function amlAssessment(): BelongsTo
    {
        return $this->belongsTo(AmlAssessment::class);
    }
}
