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
            <a href="{{ route('jobs.show', $job) }}">
                {{ $job->title }}
            </a>
        </h3>


        <div class="text-xl font-bold mb-4">
            <a href="{{ route('companies.show', $job->company) }}">
                {{ $job->company?->name }}
            </a>
        </div>

        <x-job-tags :tags="$job->tags"/>

        @if ($job->city || $job->company?->city || $job->company?->user?->city)
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $job->city ?? $job->company?->city ?? $job->company?->user?->city }}
            </div>
        @endif
    </div>
    
    @can('update', $job)
        <table class="table-auto rounded-sm">
            <tbody>
            <tr>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="{{ route('jobs.edit', $job) }}"
                       class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                        {{ trans('app.edit') }}
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg-red">
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-6 py-2 rounded-xl">
                            <i class="fa-solid fa-trash"></i>{{ trans('app.delete') }}
                        </button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    @endcan
</div>

