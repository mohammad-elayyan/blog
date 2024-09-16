@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 d-flex flex-column flex-sm-row">
            <div class="col-12 col-sm-6 col-lg-12">
                @include('includes.sidebar_box')
            </div>
            <div class="col-12 col-sm-6 col-lg-0 d-lg-none">
                @include('includes.search_box')
            </div>
        </div>
        <div class="col-lg-6">
            @include('includes.success_message')
            @include('posts.includes.submit_post')
            <hr>
            @forelse ($posts as $post)
                <div class="mt-3">
                    @include('posts.includes.post_card')
                </div>
            @empty
                <p class="text-center text-secondary mt-4">{{ __('posts.no_results') }}</p>
            @endforelse
            {{ $posts->withQueryString()->links() }}
        </div>
        <div class="col-3 d-none d-lg-block">
            @include('includes.search_box')

        </div>
    </div>
@endsection
