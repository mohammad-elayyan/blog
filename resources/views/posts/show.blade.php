@extends('layout.layout')
@section('title', 'Post')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('includes.sidebar_box')
        </div>
        <div class="col-6">
            @include('includes.success_message')

            <div class="mt-3">
                @include('posts.includes.post_card')
            </div>

        </div>

    </div>
@endsection
