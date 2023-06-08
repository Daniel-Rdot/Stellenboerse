@props(['category', 'prop'])

<div class="flex flex-row bg-gray-50 border border-gray-200 rounded p-3 justify-between">

    <div class="flex flex-row">

        <img class="hidden w-48 mr-6 md:block"
             @if ($prop->images()?->exists())
                 src="{{ asset('storage/' . $prop->images()?->first()?->path) }}"
             @elseif ($prop->$category?->images()?->exists())
                 src="{{ asset('storage/' . $prop->$category?->images()?->first()?->path) }}"
             @else
                 src="{{ asset('storage/images/no-image.png') }}"
             @endif
             alt=""/>

        <div class="flex flex-col justify-between">

            <div class="flex flex-col">

                <h3 class="text-2xl">

                    <a href="{{ route(\Illuminate\Support\Str::plural($category) . '.show', $prop) }}">
                        @if ($category === "job")
                            {{ $prop->title }}
                        @elseif ($category === "user")
                            {{ $prop->email }}
                        @else
                            {{ $prop->name }}
                        @endif
                    </a>
                </h3>

                @if ($category === "job")
                    <div class="text-xl font-bold mb-4">

                        <a href="{{ route('companies.show', $prop->company) }}">
                            {{ $prop->company?->name }}
                        </a>
                    </div>
                @endif
            </div>

            <x-job-tags :tags="$prop->tags"/>

            @if ($prop->city || $prop->company?->city || $prop->company?->user?->city)
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $prop->city ?? $prop->company?->city ?? $prop->company?->user?->city }}
                </div>
            @endif
        </div>
    </div>

    @can('update', $prop)

        <div class="flex flex-col justify-between">

            <div class="flex">

                <a href="{{ route(\Illuminate\Support\Str::plural($category) . '.edit', $prop) }}"
                   class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                    {{ trans('app.edit') }}
                </a>
            </div>

            <div class="flex">

                <form action="{{ route(\Illuminate\Support\Str::plural($category) . '.destroy', $prop) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="px-6 py-2 rounded-xl">
                        <i class="fa-solid fa-trash"></i>{{ trans('app.delete') }}
                    </button>
                </form>
            </div>

        </div>
    @endcan

</div>


