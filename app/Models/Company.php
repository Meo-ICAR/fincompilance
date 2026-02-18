<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'codice_fiscale',
        'pec',
        'oam_code',
        'email',
        'phone',
        'website',
        'description',
        'active',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    public function collaborators(): HasMany
    {
        return $this->hasMany(Collaborator::class);
    }

    public function indirizzi(): MorphMany
    {
        return $this->morphMany(Indirizzo::class, 'indirizzable');
    }
}
