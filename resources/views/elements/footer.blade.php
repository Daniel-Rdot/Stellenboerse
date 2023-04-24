<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2023</p>
    @auth
        <a href="/listings/create"
           class="absolute top-1/4 right-10 bg-black text-white py-2 px-5">{{ trans('app.new_job') }}</a>
    @else
        <a href="/users/create"
           class="absolute top-1/4 right-10 bg-black text-white py-2 px-5">{{ trans('app.login') }}</a>
    @endauth
</footer>
