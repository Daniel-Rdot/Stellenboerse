@include('layouts.app')

{!! Breadcrumbs::render('Users') !!}

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @php
        $category = "user";
    @endphp
    @forelse ($users as $user)
        <x-card-component :category="$category" :prop="$user"/>
    @empty
        {{ trans('app.no_users') }}
    @endforelse

</div>
