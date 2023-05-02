@include('app')

<x-back/>

<div class="mx-4">
    <div class="flex flex-col items-center justify-center text-center">
        <img class="w-48 mr-6 mb-6"
             src="{{ $company->images()->exists() ? asset('storage/' . $company->images()->first()->path) : asset('storage/images/no-image.png') }}"
             alt=""
        />

        <h3 class="text-2xl font-bold mb-2">{{ $company->name }}</h3>

        @if (isset($company->city))
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{ $company->city }}
            </div>
        @endif

        <div class="border border-gray-200 w-full mb-6"></div>

        @if (isset($company->city, $company->street, $company->postcode))
            <div class="text-lg my-4">
                <i class="fa-solid fa-city"></i> {{ $company->street . ", " . $company->postcode . " " . $company->city }}
            </div>
        @endif

        <div>
            <h3 class="text-xl font-bold mb-4">
                {{ trans('app.contact_info') }}
            </h3>

            <div class="text-lg space-y-6">
                <a href="mailto:{{ $company->email ?? $company->user->email }}"
                   class="block bg-laravel text-white mt-6 py-2 px-5 rounded-xl hover:opacity-80"><i
                        class="fa-solid fa-envelope"></i>
                    {{ $company->email ?? $company->user->email }}</a>
            </div>
        </div>
    </div>
</div>
