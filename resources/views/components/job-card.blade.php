<?php use App\Models\Job?>

@props(['job'])

<div class="bg-gray-50 border border-gray-200 rounded p-3">
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/jobs/{{ $job->id }}">
                    {{ $job->title }}
                </a>
            </h3>
        </div>
    </div>
</div>

