@extends('layout.layout')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form id="login-form" class="form mt-5" action="{{ route('login') }}" method="post">
                    @csrf
                    <h3 class="text-center text-muted">{{ __('posts.login') }}</h3>
                    @error('email_pass')
                        <span class="text-danger text-center" id="email-pass-error">{{ $message }}</span>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="email" class="text-muted">{{ __('posts.email') }}:</label><br>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') }}">

                        <span class="text-danger" id="email-error"></span>

                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-muted">{{ __('posts.password') }}:</label><br>
                        <input type="password" name="password" id="password" class="form-control">

                        <span class="text-danger" id="password-error"></span>

                    </div>

                    <div class="form-group text-center">
                        <label for="remember-me" class="text-muted"></label><br>
                        <input type="submit" id="submit" name="submit" class="btn btn-dark btn-md w-50"
                            value="{{ __('posts.login') }}">
                    </div>
                    <div class="text-center mt-2">
                        <a href="/register" class="text-muted">{{ __('posts.register') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let formSubmitting = false;
            $('#login-form').on('submit', function(e) {

                if (formSubmitting) return;

                let isValid = true;

                $('#email-error').text('');
                $('#password-error').text('');

                const email = $('#email').val();
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (email === '') {
                    $('#email-error').text('Email is required');
                    isValid = false;
                } else if (!emailPattern.test(email)) {
                    $('#email-error').text('Invalid email address');
                    isValid = false;
                }

                const password = $('#password').val();
                if (password === '') {
                    $('#password-error').text('Password is required');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                } else {
                    formSubmitting = true;
                    $('#login-form').submit();
                }
            });
        });
    </script>

@endsection
