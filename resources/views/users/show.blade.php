@extends('layout.layout')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('includes.sidebar_box')
        </div>
        <div class="col-md-9 col-lg-6">
            @include('includes.success_message')

            <div class="mt-3">
                @include('users.includes.user_card')
                <hr>
                @forelse ($posts as $post)
                    @if (Auth::user()->is($user))
                        <div class="mt-3">
                            @include('posts.includes.post_card')
                        </div>
                    @endif
                @empty
                    {{-- <p class="text-center text-secondary mt-4">No results found</p> --}}
                @endforelse
                {{ $posts->withQueryString()->links() }}
            </div>

        </div>

    </div>
@endsection
