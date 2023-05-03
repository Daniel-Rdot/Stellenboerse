@include('layouts.app')

{!! Breadcrumbs::render('Users') !!}

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @forelse ($users as $user)
        <x-user-card :user="$user"/>
    @empty
        {{ trans('app.no_users') }}
    @endforelse

</div>
