@include('layouts.app')

{!! Breadcrumbs::render('Companies') !!}

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @php
        $category = "company";
    @endphp
    @forelse ($companies as $company)
        <x-card-component :category="$category" :prop="$company"/>
    @empty
        {{ trans('app.no_users') }}
    @endforelse

</div>
