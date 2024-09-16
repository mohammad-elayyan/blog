<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ __('posts.search') }}</h5>
    </div>
    <div class="card-body">
        <form action={{ route('dashboard') }} method="get">
            <input value="{{ request('search') }}" placeholder="{{ __('posts.search') }}" name="search"
                class="form-control w-100" type="text" id="search">
            <button class="btn btn-dark mt-2">{{ __('posts.search') }}</button>
        </form>
    </div>
</div>
