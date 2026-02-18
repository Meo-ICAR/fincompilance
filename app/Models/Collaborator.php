<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Collaborator extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'firstname',
        'codice_fiscale',
        'oam_code',
        'birth_date',
        'birth_place',
        'email',
        'phone',
        'mobile',
        'role',
        'hire_date',
        'end_date',
        'active',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'hire_date' => 'date',
            'end_date' => 'date',
            'active' => 'boolean',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function indirizzi(): MorphMany
    {
        return $this->morphMany(Indirizzo::class, 'indirizzable');
    }
}
