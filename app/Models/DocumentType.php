<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'scope',
        'category',
        'is_mandatory',
        'requires_expiration_date',
        'requires_number',
        'requires_issuer',
        'default_validity_months',
        'alert_days_before_expiry',
        'allowed_mime_types',
        'is_sensitive',
        'oam_mapping_code',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'scope' => 'string',
            'is_mandatory' => 'boolean',
            'requires_expiration_date' => 'boolean',
            'requires_number' => 'boolean',
            'requires_issuer' => 'boolean',
            'default_validity_months' => 'integer',
            'alert_days_before_expiry' => 'integer',
            'allowed_mime_types' => 'array',
            'is_sensitive' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
