<div>
    @if ($editingComment ?? '')
    @else
        <form action={{ route('posts.comments.store', $post->id) }} method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="comment" class="fs-6 form-control" rows="1"></textarea>
                @error('comment')
                    <span class="text-danger mt-1 fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> {{ __('posts.post_comment') }} </button>
            </div>
        </form>
    @endif
    <hr>
    @forelse ($post->comments as $comment)
        <div class="d-flex align-items-start">
            <a href="{{ route('users.show', $comment->user_id) }}">
                <img style="width:35px" class="mx-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $comment->user->name }}"
                    alt="{{ $comment->user->name }}">
            </a>
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.show', $comment->user_id) }}">
                        <h6 class="">{{ $comment->user->name }}
                        </h6>
                    </a>
                    <small class="fs-6 fw-light text-muted"
                        title="{{ $comment->updated_at->toDateTimeString() }}">{{ $comment->updated_at->diffForHumans() }}</small>
                </div>
                @if ($editingComment ?? false)
                    <form action="{{ route('comments.update', $comment->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" id="content" rows="3">{{ $comment->content ?? '' }}</textarea>
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
                    <div class="d-flex justify-content-between align-items-center position-relative">
                        <p class="fs-6 mt-3 fw-light">
                            {{ $comment->content ?? '' }}
                        </p>
                        <span id="options" class="text-secondary fs-8 fw-bolder"
                            style="letter-spacing: .2vw;cursor: pointer;">...</span>
                        <div id="options-card" class="bg-primary card overflow-hidden d-none position-absolute"
                            style="top: 3rem;right: -6rem">
                            <div class="card-body pt-3">
                                <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="{{ route('comments.edit', $comment->id) }}">{{ __('posts.edit') }}</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link">

                                            <form method="POST"
                                                action="{{ route('comments.destroy', $comment->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="nav-link px-0">{{ __('posts.delete') }}</button>
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <p class="text-muted text-center fs-6">{{ __('posts.no_comments') }}</p>
    @endforelse
</div>

<script>
    $(document).ready(function() {
        $('#options').click(function() {
            $('#options-card').toggleClass('d-none');
        })
    })
</script>
