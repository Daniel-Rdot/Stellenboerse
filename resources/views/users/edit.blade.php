<form action="{{ route('users.update') }}" method="POST">
    <label for="">
        {{ trans('app.title') }}
        <input type="text" name="title">
    </label>

    @csrf

    @if($job->id)
        @method('put')
    @endif

    <button type="submit">{{ trans('app.submit') }}</button>
</form>
