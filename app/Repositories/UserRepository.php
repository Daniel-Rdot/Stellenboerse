<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserRepository
{
    public function updateOrCreate(array $data, User $user = null): User
    {
        if (!$user) {
            $user = User::create($data);
        } else {
            $user->update($data);
        }

        // Process images
        $user->images()->create([
            'path' => $data['image']->store('images', 'public')
        ]);


        // Process tags

        return $user;
    }
}
