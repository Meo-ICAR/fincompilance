<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_fiscal_code',
        'agent_id',
        'agent_fiscal_code',
        'financial_institution_id',
        'practice_number',
        'internal_reference',
        'product_type',
    ];

    protected function casts(): array
    {
        return [
            'product_type' => 'string',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function financialInstitution(): BelongsTo
    {
        return $this->belongsTo(Financial::class);
    }
}
