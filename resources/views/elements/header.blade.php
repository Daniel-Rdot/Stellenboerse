<nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"/></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
            <li>
            <span class="font-bold uppercase">
                {{trans('app.welcome') . ", " . auth()->user()->first_name}}
            </span>
            </li>

            @if(auth()->user()->company()->exists())
                <li>
                    <a href="/listings/manage" class="hover:text-laravel">
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
                    <button type="submit"><i class="fa-solid fa-door-closed"></i> {{ trans('app.logout') }}</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
