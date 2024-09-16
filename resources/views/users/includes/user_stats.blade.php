<div class="d-flex justify-content-start">
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
        </span> {{ $user->followers()->count() . ' ' . __('posts.followers') }} </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
        </span> {{ $user->followings()->count() . ' ' . __('posts.followings') }} </a>

    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
        </span> {{ $user->comments()->count() }} </a>
</div>
