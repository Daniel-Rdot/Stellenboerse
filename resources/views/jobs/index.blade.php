@include('app')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @forelse ($jobs as $job)
        <x-job-card :job="$job"/>
    @empty
        {{ trans('app.no_jobs') }}
    @endforelse

</div>
