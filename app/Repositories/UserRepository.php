<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserRepository
{
    public function updateOrCreate(array $data, Request $request, User $user = null): User
    {
        if (!$user) {
            $user = User::create($data);
        } else {
            $user->update($data);
        }

        // Process images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') ?? [] as $image) {
                $user->images()->create([
                    'path' => $image->store('public/images')
                ]);
            }
        }

//        $user->images()->create([
//            'path' => $request->file('images')->store()
//        ]);


        // Process tags

        return $user;
    }
}
