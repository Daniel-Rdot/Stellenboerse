<?php use App\Models\User?>

@props(['user'])

<div class="flex">
    <div>
        <h3 class="text-2xl">
            <a href="/users/{{ $user->id }}">{{ $user->first_name . " " . $user->last_name }}</a>
        </h3>
        <div class="text-lg mt-4">
            <i class="fa-solid fa-location-dot"></i> {{ $user->city }}
        </div>
    </div>
</div>


