<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2023</p>
    @auth
        @can('create', \App\Models\Job::class)
            <a href="{{ route('jobs.create') }}"
               class="absolute top-1/4 right-10 bg-black text-white py-2 px-5">{{ trans('app.new_job') }}</a>
        @else
            <a href="{{ route('companies.create') }}"
               class="absolute top-1/4 right-10 bg-black text-white py-2 px-5">{{ trans('app.register_company') }}</a>
        @endcan
    @else
        <a href="{{ route('login') }}"
           class="absolute top-1/4 right-10 bg-black text-white py-2 px-5">{{ trans('app.login') }}</a>
        <a href="{{ route('register') }}"
           class="absolute top-1/4 left-10 bg-black text-white py-2 px-5">{{ trans('app.register') }}</a>
    @endauth
</footer>
