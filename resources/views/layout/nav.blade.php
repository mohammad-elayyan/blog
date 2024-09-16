<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    style="{{ session()->get('locale') == 'ar' ? 'direction:rtl' : '' }}" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain mx-1">
            </span>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('login') ? 'text-info px-3 rounded' : '' }}" aria-current="page"
                            href="{{ route('login') }}">{{ __('posts.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('register') ? 'text-info px-3 rounded' : '' }}"
                            href="{{ route('register') }}">{{ __('posts.register') }}</a>
                    </li>
                @endguest
                @auth
                    @if (Auth::user()->is_admin)
                        <li class="nav-item me-2">
                            <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-info px-3 rounded' : '' }}"
                                href={{ route('admin.dashboard') }}>Admin Panel</a>
                        </li>
                    @endif
                    <li class="nav-item me-2">
                        <a class="nav-link {{ Route::is('profile') ? 'text-info px-3 rounded' : '' }}"
                            href={{ route('profile') }}>{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-small rounded">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
