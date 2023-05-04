@include('layouts.app')

{!! Breadcrumbs::render('jobs.create', null) !!}

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            {{ trans('app.job_opening') }}
        </h2>
        <p class="mb-4">{{ trans('app.list_offer') }}</p>
    </header>

    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">
                <i class="fa-solid fa-asterisk fa-2xs" style="color: red"></i> {{ trans('app.title') }}
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title" id="title"
                value="{{ old('title') }}"
                required
            />
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2">
                <i class="fa-solid fa-asterisk fa-2xs" style="color: red"></i>
                {{ trans('app.description') }}
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description" id="description"
                rows="10">
                {{ old('description') }}
            </textarea>

            @error('description')
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
                value="{{ auth()->user()->company->city ?? old('city') }}"
            />
            @error('city')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="images" class="inline-block text-lg mb-2">{{ trans('app.images') }}</label>
            <img class="w-48 mr-6 mb-6" id="image-preview"
                 src="{{ asset('storage/images/no-image.png') }}"
                 alt=""
            />
            <input type="file" class="border border-gray-200 rounded p-2 w-full" accept="image/*" name="images[]"
                   onchange="updatePreview(this, 'image-preview')" id="images"/>
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

