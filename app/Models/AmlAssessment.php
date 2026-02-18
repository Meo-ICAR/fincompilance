<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AmlAssessment extends Model
{
    protected $fillable = [
        'customer_id',
        'performed_by',
        'performed_at',
        'next_review_date',
        'risk_level',
        'risk_score',
        'due_diligence_type',
        'scopo_natura_rapporto',
        'origine_fondi',
        'pep_role_details',
        'kyc_questionnaire_data',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'performed_at' => 'datetime',
            'next_review_date' => 'date',
            'risk_level' => 'string',
            'risk_score' => 'decimal:2',
            'due_diligence_type' => 'string',
            'status' => 'string',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function performedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function beneficialOwners(): HasMany
    {
        return $this->hasMany(AmlBeneficialOwner::class);
    }

    public function watchlistHits(): HasMany
    {
        return $this->hasMany(AmlWatchlistHit::class);
    }
}
