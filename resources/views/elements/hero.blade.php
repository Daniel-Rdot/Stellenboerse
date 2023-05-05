<section
    class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div
        class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
        style="background-image: url('/storage/app/public/images/laravel-logo.png')"></div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            {{ trans('app.case') }}<span class="text-black">{{ trans('app.study') }}</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            {{ trans('app.find_job') }}
        </p>
        @guest
            <div>
                <a href="{{ route('companies.create') }}"
                   class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                    {{ trans('app.looking_hire') }} {{ trans('app.register_company') }}
                </a>
            </div>
        @endguest
    </div>
</section>
