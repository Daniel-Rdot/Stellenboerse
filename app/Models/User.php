<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
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
        'city',
        'email',
        'password',
    ];


    public static function validationRules(User $user = null): array
    {
        if (!isset($user)) {
            return [
                'first_name' => 'nullable|string|max:50',
                'last_name' => 'nullable|string|max:50',

                'city' => 'nullable|string|max:50',
                'email' => 'required|email|unique:users',

                'password' => 'sometimes|confirmed|min:8',

                'image' => 'nullable|image|dimensions:max_width=180,max_height=180',
            ];
        } else {
            return [
                'first_name' => 'nullable|string|max:50',
                'last_name' => 'nullable|string|max:50',

                'city' => 'nullable|string|max:50',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],

                'old_password' => 'nullable',
                'password' => 'nullable|confirmed|min:8',

                'image' => 'nullable|image|dimensions:max_width=180,max_height=180',
            ];
        }
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


    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
