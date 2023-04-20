<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'name',

        'email',
        'website',

        'street',
        'postcode',
        'city',
    ];

    public static function validationRules(): array
    {
        return [
            'user_id' => 'required',

            'name' => 'required',

            'email' => 'nullable|email',
            'website' => 'nullable',
            
            'street' => 'nullable',
            'postcode' => 'nullable',
            'city' => 'nullable',
        ];
    }

    // Relationship to User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Image
    public function images(): morphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
