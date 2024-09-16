@extends('layout.layout')
@section('title', 'Terms')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('includes.sidebar_box')
        </div>
        <div class="col-6">
            <h1>{{ __('posts.terms') }}</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, corrupti iure magnam obcaecati sunt atque
                laboriosam
                provident eaque perspiciatis doloribus nulla praesentium blanditiis cumque vel rerum nostrum aliquam odio
                quod?
            </p>
        </div>
        <div class="col-3">
            @include('includes.search_box')

        </div>
    </div>
@endsection
