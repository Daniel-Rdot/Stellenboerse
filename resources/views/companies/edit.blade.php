@include('layouts.app')

{!! Breadcrumbs::render('companies.edit', $company) !!}

<div class="max-w-2xl mx-auto flex flex-row">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg ml-10 mr-10 mb-10 mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                {{ trans('app.your_company') }}
            </h2>
        </header>

        <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    {{ trans('app.name') }}
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name" id="name"
                    value="{{ $company->name }}"
                />
                @error('name')
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
                    value="{{ $company->street ?? old('street') }}"
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
                    value="{{ $company->postcode ?? old('postcode') }}"
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
                    value="{{ $company->city ?? old('city') }}"
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
                    value="{{ $company->email ?? old('email') }}"
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
                    value="{{ $company->website ?? old('website')}}"
                />
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">{{ trans('app.logo') }}</label>
                <img class="w-48 mr-6 mb-6" id="image-preview"
                     src="{{ $company->images()?->first() ? asset('storage/' . $company->images()?->first()?->path) : asset('storage/images/no-image.png') }}"
                     alt=""
                />
                <input type="file" class="border border-gray-200 rounded p-2 w-full" accept="image/*"
                       name="image"
                       onchange="updatePreview(this, 'image-preview')" id="image"/>
                @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <i class="fa-solid fa-asterisk fa-2xs" style="color: red"></i>{{ trans('app.required_field') }}
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    {{ trans('app.submit_changes') }}
                </button>
            </div>
        </form>

        <div class="mb-6">
            <form action="{{ route('companies.destroy', $company) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>{{ trans('app.delete_company') }}
                </button>
            </form>
        </div>
    </div>
</div>

