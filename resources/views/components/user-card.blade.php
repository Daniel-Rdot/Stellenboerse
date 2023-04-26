<?php use App\Models\User?>

@props(['user'])

<div class="bg-gray-50 border border-gray-200 rounded p-3">
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/users/{{ $user->id }}">
                    {{ $user->email }}
                </a>
            </h3>
        </div>
    </div>
</div>

