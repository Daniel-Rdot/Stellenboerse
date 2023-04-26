@include('app')

<x-back/>

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            {{ trans('app.change_password') }}
        </h2>
    </header>

    <form action="{{ route('passwords.change') }}" method="POST">
        @csrf
        

        <div class="mb-6">
            <label for="current_password" class="inline-block text-lg mb-2">
                {{ trans('app.current_password') }}
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="current_password" id="current_password"
            />
            @error('current_password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
                {{ trans('app.new_password') }}
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
                {{ trans('app.submit_changes') }}
            </button>
        </div>
    </form>
</div>
