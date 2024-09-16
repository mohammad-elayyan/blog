@auth
    @if (Auth::user()->is_admin)
        <h4>{{ __('posts.share_posts') }} </h4>
        <div class="row">
            <form action={{ route('posts.store') }} method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                    @error('content')
                        <div class="d-block fs-6 text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark">{{ __('posts.share') }} </button>
                </div>
            </form>
        </div>
    @endif
@endauth
@guest
    <h4>{{ __('posts.login_to_share') }}</h4>
    {{-- <h4>{{ trans('posts.login_to_share') }}</h4>
    <h4>@lang('posts.login_to_share')</h4> --}}
@endguest
