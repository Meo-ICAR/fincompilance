<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AmlWatchlistHit extends Model
{
    protected $fillable = [
        'aml_assessment_id',
        'list_name',
        'match_type',
        'details',
        'is_false_positive',
        'resolution_notes',
    ];

    protected function casts(): array
    {
        return [
            'is_false_positive' => 'boolean',
        ];
    }

    public function amlAssessment(): BelongsTo
    {
        return $this->belongsTo(AmlAssessment::class);
    }
}
