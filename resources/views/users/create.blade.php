@include('layouts.app')

{!! Breadcrumbs::render('users.create', null) !!}

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            {{ trans('app.create_user') }}
        </h2>

    </header>

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($user->id)
            @method('put')
        @endif

        <div class="mb-6">
            <label for="first_name" class="inline-block text-lg mb-2">
                {{ trans('app.first_name') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="first_name" id="first_name"
                value="{{ old('first_name') }}"
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
                value="{{ old('last_name') }}"
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
                value="{{ old('city') }}"
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
                value="{{ old('email') }}"
            />
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="inline-block text-lg mb-2">{{ trans('app.profile_picture') }}</label>
            <img class="w-48 mr-6 mb-6" id="image-preview"
                 src="{{asset('storage/images/no-image.png')}}"
                 alt=""
            />
            <input type="file" class="border border-gray-200 rounded p-2 w-full" accept="image/*" name="image"
                   onchange="updatePreview(this, 'image-preview')" id="image"/>
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
                {{ trans('app.password') }}
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password" id="password"
            />
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="inline-block text-lg mb-2">
                {{ trans('app.password_confirmation') }}
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password_confirmation" id="password_confirmation"
            />
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                {{ trans('app.submit') }}
            </button>
        </div>
    </form>
</div>
