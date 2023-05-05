<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed $url
 */
class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',

        'city',

        'company_id',
    ];

    // Seeder sagt: Attempt to read property "id" on null
    public static function booted()
    {
        static::creating(function (Job $job) {
            $job->company_id = Auth::user()->company->id;
        });
    }

    public static function validationRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required',

            'city' => 'nullable|string|max:50',

            'images' => 'nullable',
            'images.*' => 'image|dimensions:max_width=250,max_height=250',
        ];
    }


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getUrlAttribute()
    {
        return route('jobs.show', ['job' => $this]);
    }

    public function scopeSearch(Builder $query, array $data): void
    {
        $search = $data['search'];

        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('city', 'like', '%' . $search . '%');
    }
}
