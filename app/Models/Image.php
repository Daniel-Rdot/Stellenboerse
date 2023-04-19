<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type',
    ];

    public function validationRules(): array
    {
        return [
            'path' => 'required',
            'imageable_id' => 'required',
            'imageable_type' => 'required',
        ];
    }

    // Relationship to imageable models (Job, User, Company)
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }


}
