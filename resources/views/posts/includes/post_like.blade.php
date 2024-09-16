@auth

    @if (!Auth::user()->likesPost($post))
        <form action="{{ route('posts.like', $post->id) }}" method="POST">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6 d-inline-block" title="{{ __('posts.like') }}"> <span
                    class="far fa-heart mx-1">
                </span> </button>{{ $post->likes_count }}
        </form>
    @else
        <form action="{{ route('posts.dislike', $post->id) }}" method="POST">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6 d-inline-block" title="{{ __('posts.unlike') }}"> <span
                    class="fas fa-heart mx-1">
                </span> </button>{{ $post->likes_count }}
        </form>
    @endif
@endauth
@guest
    <a href="/login" class="fw-light nav-link fs-6 d-inline-block" title="{{ __('posts.like') }}"> <span
            class="far fa-heart mx-1">
        </span> </a>{{ $post->likes_count }}
@endguest
