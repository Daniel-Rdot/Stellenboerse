@include('layouts.app')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @forelse ($companies as $company)
        <x-company-card :company="$company"/>
    @empty
        {{ trans('app.no_users') }}
    @endforelse

</div>
