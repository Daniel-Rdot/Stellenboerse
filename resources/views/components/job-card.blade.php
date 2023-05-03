<?php use App\Models\Job?>

@props(['job'])

<div class="bg-gray-50 border border-gray-200 rounded p-3 flex">
    <img
        class="hidden w-48 mr-6 md:block"
        @if ($job->images()?->exists())
            src="{{ asset('storage/' . $job->images()?->first()?->path) }}"
        @elseif ($job->company?->images()?->exists())
            src="{{ asset('storage/' . $job->company?->images()?->first()?->path) }}"
        @else
            src="{{ asset('storage/images/no-image.png') }}"
        @endif
        alt=""/>
    <div>
        <h3 class="text-2xl">
            <a href="/jobs/{{ $job->id }}">
                {{ $job->title }}
            </a>
        </h3>

        <div class="text-xl font-bold mb-4">
            <a href="/companies/{{ $job->company?->id }}">
                {{ $job->company?->name }}
            </a>
        </div>

        {{--        <x-job-tags :tagsCsv="$job->tags"/>--}}

        @if ($job->city || $job->company?->city || $job->company?->user?->city)
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $job->city ?? $job->company?->city ?? $job->company?->user?->city }}
            </div>
        @endif
    </div>
</div>

