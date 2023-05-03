@include('layouts.app')

{!! Breadcrumbs::render('companies.create', null) !!}

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            {{ trans('app.register_company') }}
        </h2>
        <p class="mb-4">{{ trans('app.reg_to_post_jobs') }}</p>
    </header>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                <i class="fa-solid fa-asterisk fa-2xs" style="color: red"></i> {{ trans('app.name') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name" id="name"
                value="{{ old('name') }}"
                required
            />
            @error('name')
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
            <label for="website" class="inline-block text-lg mb-2">
                {{ trans('app.website') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="website" id="website"
                value="{{ old('website') }}"
            />
            @error('website')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="street" class="inline-block text-lg mb-2">
                {{ trans('app.street') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="street" id="street"
                value="{{ old('street') }}"
            />
            @error('street')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="postcode" class="inline-block text-lg mb-2">
                {{ trans('app.postcode') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="postcode" id="postcode"
                value="{{ old('postcode') }}"
            />
            @error('postcode')
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
            <label for="image" class="inline-block text-lg mb-2">{{ trans('app.logo') }}</label>
            <img class="w-48 mr-6 mb-6" id="image-preview"
                 src="{{asset('storage/images/no-image.png')}}"
                 alt=""
            />
            <input type="file" class="border border-gray-200 rounded p-2 w-full" accept="image/*" name="image"
                   onchange="updatePreview(this, 'image-preview')" id="image"/>
            @error('images')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <i class="fa-solid fa-asterisk fa-2xs" style="color: red"></i>{{ trans('app.required_field') }}
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                {{ trans('app.submit') }}
            </button>
        </div>
    </form>
</div>
