<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div
            class="d-flex flex-column align-items-start justify-content-between gap-3 align-items-sm-center flex-sm-row">
            <div class="d-flex align-items-center">
                <a href="{{ route('users.show', $post->user_id) }}">
                    <img style="width:50px" class="mx-2 avatar-sm rounded-circle" src="{{ $post->user->getImageUrl() }}"
                        alt="{{ $post->user->name }}">
                </a>
                <div>
                    <h5 class="card-title mb-0"><a
                            href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="align-self-end">
                @if (!Route::is('posts.edit'))
                    <a href={{ route('posts.show', $post->id) }} class="fs-5 bg-info text-light p-2"
                        title="{{ __('posts.view') }}"><span class="fa fa-link"></span></a>
                    @can('update', $post)
                        <a href={{ route('posts.edit', $post->id) }} class="fs-5 bg-warning text-light p-2"
                            title="{{ __('posts.edit') }}"><span class="fa fa-pen"></span></a>
                        <form method="post" action={{ route('posts.destroy', $post->id) }} class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button class="fs-5 bg-danger text-light p-2 border-0" style="line-height: initial"
                                title="{{ __('posts.delete') }}"><span class="fa fa-trash"></span></button>
                        </form>
                    @endcan
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action={{ route('posts.update', $post->id) }} method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <textarea name="title" class="form-control" id="title" rows="3">{{ $post->title }}</textarea>
                    @error('title')
                        <div class="d-block fs-6 text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $post->content }}</textarea>
                    @error('content')
                        <div class="d-block fs-6 text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <a href="{{ route('posts.show', $post->id) }}"
                        class="btn btn-dark mb-3 btn-sm">{{ __('posts.cancel') }}</a>
                    <button class="btn btn-dark mb-3 btn-sm"> {{ __('posts.update') }} </button>
                </div>
            </form>
        @else
            <h4 class="fs-4">{{ $post['title'] }}</h4>
            <p class="fs-6 fw-light text-muted">
                {{ $post['content'] }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                @include('posts.includes.post_like')
            </div>
            <div>
                <span class="fs-6 fw-light text-muted" title="{{ $post->updated_at->toDateTimeString() }}"> <span
                        class="fas fa-clock"> </span>
                    {{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
        @include('posts.includes.comments_box')

    </div>
</div>
