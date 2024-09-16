<div class="card">
    @if ($editingProf ?? false)
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
    @endif
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-end justify-content-between flex-column flex-sm-row align-items-sm-start gap-3">
            <div class="d-flex align-items-center">
                <img class="mx-3 avatar-sm rounded-circle w-25" src="{{ $user->getImageUrl() }}" alt="Mario Avatar">
                <div>
                    @if ($editingProf ?? false)
                        <input class="form-control" type="text" placeholder="name" value="{{ $user->name }}"
                            name="name">
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    @else
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                    @endif
                    <span class="fs-6 text-muted"><span>@</span>{{ $user->email }}</span>
                </div>
            </div>

            @can('update', $user)
                @if ($editingProf ?? false)
                @else
                    <div>
                        <a href={{ route('users.edit', $user->id) }} class="fs-5 bg-warning text-light p-2"><span
                                class="fa fa-pen"></span></a>

                    </div>
                @endif
            @endcan

        </div>
    </div>
    @if ($editingProf ?? false)
        <div class="px-2 mt-4">
            <label for="">Profile Picture</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="text-danger fs-6">{{ $message }}</span>
            @enderror
        </div>
    @endif
    <div class="px-2 mt-4">
        <h5 class="fs-5"> {{ __('posts.about') }} : </h5>

        @if ($editingProf ?? false)
            <label for="">Bio:</label>
            <textarea class="form-control" name="bio" id="bio">{{ $user->bio }}</textarea>
            @error('bio')
                <span class="text-danger fs-6">{{ $message }}</span>
            @enderror
        @else
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            @include('users.includes.user_stats')
        @endif
        @auth
            @if (Auth::user()->isNot($user))
                <div class="mt-3 mb-2">
                    @if (Auth::user()->follows($user))
                        <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-sm"> {{ __('posts.unfollow') }} </button>
                        </form>
                    @else
                        <form action="{{ route('users.follow', $user->id) }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-sm"> {{ __('posts.follow') }} </button>
                        </form>
                    @endif
                </div>
            @endif
        @endauth
    </div>
    @if ($editingProf ?? false)
        <a class="btn btn-dark btn-small my-3 mx-2" href="{{ route('profile') }}">{{ __('posts.cancel') }}</a>
        <button class="btn btn-dark btn-small my-3">{{ __('posts.update') }}</button>
        </form>
    @endif
</div>
