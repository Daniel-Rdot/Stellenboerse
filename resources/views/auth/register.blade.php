@extends('app')

@section('content')
    <x-back/>

    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                {{ trans('app.register') }}
            </h2>
            <p class="mb-4">{{ trans('app.new_acc') }}</p>
        </header>


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-6">
                <label for="email"
                       class="inline-block text-lg mb-2">{{ trans('app.email_address') }}</label>


                <input id="email" type="email"
                       class="border border-gray-200 rounded p-2 w-full
                       form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="mb-6">
                <label for="password"
                       class="inline-block text-lg mb-2">{{ trans('app.password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                           class="border border-gray-200 rounded p-2 w-full
                           form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="password-confirm"
                       class="inline-block text-lg mb-2">{{ trans('app.password_confirmation') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="border border-gray-200 rounded p-2 w-full
                    form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    {{ trans('app.sign_up') }}
                </button>
            </div>
        </form>
    </div>

@endsection
