@include('layouts.app')

{!! Breadcrumbs::render('Jobs') !!}

@include('elements.search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @php
        $category = "job";
    @endphp
    @forelse ($jobs as $job)
        <x-card-component :category="$category" :prop="$job"/>
    @empty
        {{ trans('app.no_jobs') }}
    @endforelse

</div>
