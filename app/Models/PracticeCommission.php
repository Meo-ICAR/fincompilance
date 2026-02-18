<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PracticeCommission extends Model
{
    protected $fillable = [
        'loan_id',
        'payer_type',
        'type',
        'amount_gross',
        'vat_amount',
        'amount_total',
        'status',
        'accrual_date',
        'payment_date',
        'invoice_number',
        'is_retrocession_eligible',
    ];

    protected function casts(): array
    {
        return [
            'payer_type' => 'string',
            'type' => 'string',
            'status' => 'string',
            'amount_gross' => 'decimal:2',
            'vat_amount' => 'decimal:2',
            'amount_total' => 'decimal:2',
            'accrual_date' => 'date',
            'payment_date' => 'date',
            'is_retrocession_eligible' => 'boolean',
        ];
    }

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }
}
