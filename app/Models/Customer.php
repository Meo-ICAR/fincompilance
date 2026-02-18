<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'ragione_sociale_o_cognome',
        'nome',
        'codice_fiscale',
        'partita_iva',
        'is_pep',
        'is_sanctioned',
    ];

    protected function casts(): array
    {
        return [
            'is_pep' => 'boolean',
            'is_sanctioned' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function amlAssessments(): HasMany
    {
        return $this->hasMany(AmlAssessment::class);
    }
}
