<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Auth;


class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

        'email',
        'website',

        'street',
        'postcode',
        'city',

        'user_id',
    ];

    public static function validationRules(): array
    {
        return [
            'name' => 'required|string',

            'email' => 'nullable|email',
            'website' => 'nullable|url',

            'street' => 'nullable|string',
            'postcode' => 'nullable|string',
            'city' => 'nullable|string',

            'image' => 'nullable|image|dimensions:max_width=250,max_height=250',
        ];
    }

    // Seeder sagt: Attempt to read property "id" on null
    public static function booted()
    {
        static::creating(function (Company $company) {
            $company->user_id = Auth::user()->id;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
