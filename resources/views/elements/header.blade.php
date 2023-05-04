<nav class="flex justify-between items-center mb-4">
    <a href="{{ route('home') }}"><img class="w-24 logo" src="{{asset('storage/images/logo.png')}}" alt=""/></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
            <li>
            <span class="font-bold uppercase">
                {{ isset(auth()->user()->first_name) ? trans('app.welcome') . ", " . auth()->user()->first_name : trans('app.welcome') . ", " . auth()->user()->email }}
            </span>
            </li>

            @if(auth()->user()?->company()?->exists())
                <li>
                    <a href="{{ route('jobs.index', ['manage' => auth()->user()->company]) }}"
                       class="hover:text-laravel">
                        <i class="fa-solid fa-object-group"></i> {{ trans('app.manage_listings') }}
                    </a>
                </li>
            @endif

            <li>
                <a href="/users/{{ auth()->user()->id }}/edit" class="hover:text-laravel">
                    <i class="fa-solid fa-gear"></i> {{ trans('app.acc_settings') }}
                </a>
            </li>

            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="hover:text-laravel"><i
                            class="fa-solid fa-door-closed"></i> {{ trans('app.logout') }}</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
