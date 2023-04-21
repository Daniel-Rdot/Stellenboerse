<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
    ];

    public static function validationRules(): array
    {
        return [
            'tag' => 'required',
        ];
    }


    public function jobs(): MorphToMany
    {
        return $this->morphedByMany(Job::class, 'taggable');
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'taggable');
    }

    public function companies(): MorphToMany
    {
        return $this->morphedByMany(Company::class, 'taggable');
    }

}
