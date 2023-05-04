@include('layouts.app')
@include('elements.hero')

{!! Breadcrumbs::render('home') !!}

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <div class="mb-6">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                {{ trans('app.welcome') }}
            </h2>
        </header>
    </div>

    <div class="mb-6">
        <a href="{{ route('jobs.index') }}" class="bg-laravel text-white py-2 px-5">
            {{ trans('app.view_jobs') }}
        </a>
    </div>
</div>

