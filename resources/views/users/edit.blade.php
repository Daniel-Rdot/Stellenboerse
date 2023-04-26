@include('app')

<x-back/>

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            {{ trans('app.acc_details') }}
        </h2>
    </header>

    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="mb-6">
            <label for="first_name" class="inline-block text-lg mb-2">
                {{ trans('app.first_name') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="first_name" id="first_name"
                value="{{ $user->first_name ?? old('first_name') }}"
            />
            @error('first_name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="last_name" class="inline-block text-lg mb-2">
                {{ trans('app.last_name') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="last_name" id="last_name"
                value="{{ $user->last_name ?? old('last_name') }}"
            />
            @error('last_name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="city" class="inline-block text-lg mb-2">
                {{ trans('app.city') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="city" id="city"
                value="{{ $user->city ?? old('city') }}"
            />
            @error('city')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">
                {{ trans('app.email') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="email" id="email"
                value="{{ $user->email }}"
            />
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="images" class="inline-block text-lg mb-2">{{ trans('app.profile_picture') }}</label>
            <img class="w-48 mr-6 mb-6" id="image-preview"
                 src="{{ $user->images()->first() ? asset('storage/' . $user->images()->first()->path) : asset('storage/images/no-image.png') }}"
                 alt=""
            />
            <input type="file" class="border border-gray-200 rounded p-2 w-full" accept="image/*" name="images[]"
                   onchange="updatePreview(this, 'image-preview')" id="images"/>
            @error('images')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <i class="fa-solid fa-key"></i>
            <a class="text-black-500" href="{{ route('passwords.change') }}">
                {{ trans('app.change_password') }}
            </a>
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                {{ trans('app.submit_changes') }}
            </button>
        </div>
    </form>
    <div class="mb-6">
        <form action="{{ route('users.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i>{{ trans('app.delete_account') }}</button>
        </form>
    </div>
</div>
