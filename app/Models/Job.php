<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'location',
        'email',
        'website',
        'description'
    ];

    public function validationRules(): array
    {
        return [
            'company_id' => 'required',
            'title' => 'required|max:255',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'description' => 'required',
        ];
    }

    // Relationship to Company
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // Relationship to Tags
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
