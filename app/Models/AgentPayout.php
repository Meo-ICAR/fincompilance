<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentPayout extends Model
{
    protected $fillable = [
        'loan_id',
        'agent_id',
        'practice_commission_id',
        'calculation_base',
        'percentage',
        'amount_due',
        'status',
        'paid_at',
        'agent_invoice_reference',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
            'calculation_base' => 'decimal:2',
            'percentage' => 'decimal:2',
            'amount_due' => 'decimal:2',
            'paid_at' => 'date',
        ];
    }

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function practiceCommission(): BelongsTo
    {
        return $this->belongsTo(PracticeCommission::class);
    }
}
