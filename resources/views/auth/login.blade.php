@extends('app')

@section('content')
    <x-back/>

    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <div class="row justify-content-center">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    {{ trans('app.login') }}
                </h2>
            </header>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email"
                           class="inline-block text-lg mb-2">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="border border-gray-200 rounded p-2 w-full form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="password"
                           class="inline-block text-lg mb-2">{{ trans('app.password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="border border-gray-200 rounded p-2 w-full form-control @error('password') is-invalid @enderror"
                               name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        {{ trans('app.sign_up') }}
                    </button>
                </div>

                <div class="mb-6">
                    <a href="{{ route('password.request') }}">
                        {{ trans('app.forgot_password') }}
                    </a>
                </div>

                <div class="row mb-0">

                </div>
            </form>
        </div>
    </div>

@endsection
