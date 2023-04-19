<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'location',
        'email',
        'password',
    ];


    public function validationRules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required|max:255',
            'location' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship to Company
    public function company(): hasOne
    {
        return $this->hasOne(Company::class);
    }

    // Relationship to Image
    public function images(): MorphMany
    {
        return $this->morphMany(Tag::class, 'imageable');
    }
}
