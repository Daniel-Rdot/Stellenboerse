<div class="h-screen flex justify-center">
    <form action="">
        <div class="border-2 w-1/2 border-gray-100 m-4 rounded-lg">
            <input
                type="text"
                name="search"
                class="text-center h-14 w-1/2 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                placeholder="{{ trans('app.look_for_jobs') }}"
            />
            <button type="submit" class="h-10 px-4 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </button>
        </div>
    </form>
</div>
