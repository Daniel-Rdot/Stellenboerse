@include('app')

<x-back/>

<div class="mx-4">
    <div class="flex flex-col items-center justify-center text-center">
        <img class="w-48 mr-6 mb-6"
             src="{{ $job->images()->exists() ? asset('storage/' . $job->images()->first()->path) : asset('storage/images/no-image.png') }}"
             alt=""
        />

        <h3 class="text-3xl font-bold mb-2">{{ $job->title }}</h3>

        <div class="text-lg my-4">
            @if (isset($job->company->city))
                <i class="fa-solid fa-location-dot"></i> {{ $job->company->city }}
            @endif
        </div>

        <div class="border border-gray-200 w-full mb-6"></div>

        <div>
            <h3 class="text-2xl font-bold mb-4">
                {{ trans('app.description') }}
            </h3>
            <div class="text-lg space-y-6">
                {{ $job->description }}

                <a href="mailto:{{ $job->company->email ?? $job->company->user->email }}"
                   class="block bg-laravel text-white mt-6 py-2 p-3 rounded-xl hover:opacity-80">
                    <i class="fa-solid fa-envelope"></i>
                    {{ trans('app.contact_employer') }}
                </a>

                @if (isset($job->company->website))
                    <a href="{{ $job->company->website }}"
                       target="_blank"
                       class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i>
                        {{ trans('app.visit_website') }}
                    </a>
                @endif

            </div>
        </div>
    </div>
</div>



