@include('app')

<x-back/>

<div class="mx-4">
    <div class="flex flex-col items-center justify-center text-center">
        <img class="w-48 mr-6 mb-6"
             src="{{ $user->images()->exists() ? asset('storage/' . $user->images()->first()->path) : asset('storage/images/no-image.png') }}"
             alt=""
        />

        <h3 class="text-2xl font-bold mb-2">{{ $user->first_name . " " . $user->last_name }}</h3>

        <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> {{ $user->city }}
        </div>

        <div class="border border-gray-200 w-full mb-6"></div>

        <div>
            <h3 class="text-xl font-bold mb-4">
                {{ trans('app.contact_info') }}
            </h3>

            <div class="text-lg space-y-6">
                <a href="{{ $user->email }}"
                   class="block bg-laravel text-white mt-6 py-2 px-5 rounded-xl hover:opacity-80"><i
                        class="fa-solid fa-envelope"></i>
                    {{ $user->email }}</a>
            </div>
        </div>
    </div>
</div>



